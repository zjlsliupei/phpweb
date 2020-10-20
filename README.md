# phpweb框架
phpweb框架基于thinkphp6.0稳定版制作

## 安装
composer create-project zjlsliupei/phpweb web1

## 配置
跟环境有关配置都配置在根目录下，分别是以下3个，最终应用的是.env配置，不同环境采用覆盖方式
- .dev.env (开发环境配置)
- .test.env (测试环境配置)
- .prod.env (正式环境配置)

## token
token生成方法
```php
// 实例化token类，并采用tp的缓存方案来保存token
$ins = \token\Factory::instance(\token\driver\TpCache::class);
// token绑定参数为'{"name":"liupei"}'， 过期时间为3600秒，并返回生成的token
$token = $ins->set('{"name":"liupei"}', 3600);
```

token验证
框架会自动验证token合法性，拦截不合法请求，如果要过滤某些接口不验证，请修改config/app.php
```php
    // 配置不检测token的pathinfo，不区分大小写
    'allow_pathinfo' => [
        'index/index/index', // index/index/index接口不验证token
    ]
```
