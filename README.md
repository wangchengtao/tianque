天阙开放平台 SDK

## Install
`composer require wangchengtao/tianque`

## Usage
- Notes: More Usages please refer to test cases

```php

use Summer\TianQue\Kernel\AopClient;
use Summer\TianQue\Kernel\Config;

$config = new Config(
    'https://openapi-test.tianquetech.com',
    'your orgId',
    'your privateKey',
    '天阙平台公钥',
);

$client = new AopClient($config);

$request = new UploadRequest();
$request->setOrgId($config->getOrgId());
$request->setPictureType(86);
$request->setFile('http://gips1.baidu.com/it/u=3874647369,3220417986&fm=3028&app=3028&f=JPEG&fmt=auto?w=720&h=1280');

$res = $client->upload($request);
```