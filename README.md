天阙开放平台 SDK

## 主要目的
1. 集成 Composer
2. 编码风格遵循 PSR-12
3. 单元测试
4. 框架集成
5. 补充 PHPDoc

## Version Guidance
- php >=7.4

## 安装
```bash
composer require wangchengtao/tianque
```

For laravel 6+
```bash
composer require wangchengtao/laravel-tianque
```

## 如何使用
- Notes: More Usages please refer to test cases

```php
use Summer\TianQue\Kernel\AopClient;
use Summer\TianQue\Kernel\Config;
use Summer\TianQue\Kernel\AopFactory;
use Summer\TianQue\Kernel\RequestFactory;
use Summer\TianQue\Request\Merchant\QueryApplyInfoRequest;

$config = new Config(
    'https://openapi-test.tianquetech.com',
    'your orgId',
    'your privateKey',
    '天阙平台公钥',
);

$client = new AopClient($config);

// or get client by factory
//$config = [
//   'domain' => 'https://openapi-test.tianquetech.com',
//   'org_id' => 'your orgId',
//   'private_key' => 'your privateKey',
//   'public_key' => '天阙平台公钥',
//];
//$client = AopFactory::client($config);

// 自定义 reqId 须实现 GeneratorInterface 接口
//$client->setGenerator(CustomRandomGenerator::class);


$request = new QueryApplyInfoRequest();
$request->setId('123');

// or init through __construct
//$request = new QueryApplyInfoRequest(['id' => '123']);

// or use factory
//$request = RequestFactory::create('POST', '/merchant/specialApplication/queryApplyInfo', [
//   'id' => '123',
//]);

$res = $client->execute($request);
```

## 测试
- `./vendor/bin/phpunit`

## 扩展
1. 添加更多请求对象 须继承 `Summer\TianQue\Request\Request`, 推荐使用工厂创建请求对象
