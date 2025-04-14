天阙开放平台 SDK

## Install
`composer require wangchengtao/tianque`

## Version Guidance

| Version | PHP Version |
|---------|-------------|
| 7.x     | \>=7.4,<8.0 |
| main    | \>=8.0      |

## Usage
- Notes: More Usages please refer to test cases

图片上传
```php

use Summer\TianQue\Kernel\AopClient;
use Summer\TianQue\Kernel\AopFactory;
use Summer\TianQue\Kernel\Config;

$config = new Config(
    'https://openapi-test.tianquetech.com',
    'your orgId',
    'your privateKey',
    '天阙平台公钥',
);

$client = new AopClient($config);

// or get client by factory
//$config = [
//    'domain' => 'https://openapi-test.tianquetech.com',
//    'org_id' => 'your orgId',
//    'private_key' => 'your privateKey',
//    'public_key' => '天阙平台公钥',
//];
//$client = AopFactory::client($config);

$request = new UploadRequest();
$request->setOrgId($config->getOrgId());
$request->setPictureType(86);
$request->setFile('http://gips1.baidu.com/it/u=3874647369,3220417986&fm=3028&app=3028&f=JPEG&fmt=auto?w=720&h=1280');

$res = $client->upload($request);
```