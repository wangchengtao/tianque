<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Summer\TianQue\Kernel\Contract\RandomGenerator;
use Summer\TianQue\Kernel\Exception\TianQueException;
use Summer\TianQue\Kernel\Support\ApiResponse;
use Summer\TianQue\Kernel\Support\DefaultRandomGenerator;
use Summer\TianQue\Kernel\Support\Signature;
use Summer\TianQue\Request\Request;
use Summer\TianQue\Request\UploadRequest;
use Summer\TianQue\Response\Response;
use Summer\TianQue\Response\UploadResponse;

class AopClient
{
    protected Config $config;

    protected Client $client;

    protected RandomGenerator $generator;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client = new Client([
            'base_uri' => $config->getDomain(),
        ]);
        $this->generator = new DefaultRandomGenerator();
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function setGenerator(RandomGenerator $generator): void
    {
        $this->generator = $generator;
    }

    public function execute(Request $request): ApiResponse
    {
        // 组装参数 && 签名
        // $apiRequest = new ApiRequest();
        // $apiRequest->setOrgId($this->config->getOrgId());
        // $apiRequest->setReqId($this->generator->generate());
        // $apiRequest->setSignType($this->config->getSignType());
        // $apiRequest->setTimestamp();
        // $apiRequest->setReqData($request);
        // $apiRequest->setSign(Signature::sign($apiRequest->toArray(), $apiRequest->getSignType(), $this->config->getPrivateKey()->getKey()));

        $params = [
            'orgId' => $this->config->getOrgId(),
            'reqId' => $this->generator->generate(),
            'reqData' => $request->toArray(),
            'timestamp' => date('YmdHis'),
            'signType' => $this->config->getSignType(),
            'version' => $this->config->getVersion(),
        ];

        $params['sign'] = Signature::sign($params, $this->config->getSignType(), $this->config->getPrivateKey()->getKey());

        // 发送请求
        $res = $this->request($request->getMethod(), $request->getUri(), [
            RequestOptions::JSON => $params,
        ]);

        // 验签 && 处理结果
        return $this->handleBusiness($this->handleResponse($res));
    }

    public function upload(UploadRequest $request): UploadResponse
    {
        // $request->setOrgId($this->config->getOrgId());
        $request->setReqId($this->generator->generate());

        $res = $this->request($request->getMethod(), $request->getUri(), [
            RequestOptions::MULTIPART => $request->toMultipart(),
        ]);

        $body = $this->handleResponse($res);

        $apiResponse = new ApiResponse($body);

        // 业务处理
        if ($apiResponse->getCode() != ApiResponse::SUCCESS) {
            throw new TianQueException($apiResponse->getMsg());
        }

        $uploadRes = new UploadResponse($apiResponse->getRespData());

        if ($uploadRes->getBizCode() != Response::SUCCESS) {
            throw new TianQueException($uploadRes->getBizMsg());
        }

        return $uploadRes;
    }

    protected function request(string $method, string $uri, array $options): ResponseInterface
    {
        return $this->client->request($method, $uri, $options);
    }

    protected function handleResponse(ResponseInterface $response): array
    {
        if ($response->getStatusCode() !== 200) {
            throw new TianQueException('请求失败' . $response->getStatusCode());
        }

        $body = json_decode($response->getBody()->getContents(), true);

        if (! $body) {
            throw new TianQueException('响应数据解析失败');
        }

        return $body;
    }

    protected function handleBusiness(array $body): ApiResponse
    {
        $apiResponse = new ApiResponse($body);

        // 业务处理
        if ($apiResponse->getCode() != ApiResponse::SUCCESS) {
            throw new TianQueException($apiResponse->getMsg());
        }

        // 验签
        if (! Signature::verify($body, $apiResponse->getSign(), $apiResponse->getSignType(), $this->config->getPublicKey()->getKey())) {
            throw new TianQueException('签名验证失败');
        }

        return $apiResponse;
    }
}
