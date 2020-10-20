<?php
// +----------------------------------------------------------------------
// | 应用设置
// +----------------------------------------------------------------------

return [
    // 应用地址
    'app_host'         => env('app.host', ''),
    // 应用的命名空间
    'app_namespace'    => '',
    // 是否启用路由
    'with_route'       => true,
    // 默认应用
    'default_app'      => 'index',
    // 默认时区
    'default_timezone' => 'Asia/Shanghai',

    // 应用映射（自动多应用模式有效）
    'app_map'          => [],
    // 域名绑定（自动多应用模式有效）
    'domain_bind'      => [],
    // 禁止URL访问的应用列表（自动多应用模式有效）
    'deny_app_list'    => [],

    // 异常页面的模板文件
    'exception_tmpl'   => app()->getThinkPath() . 'tpl/think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'    => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'   => false,

    // 业务相关配置
    // 业务相关配置
    // 业务相关配置

    // 配置不检测token的pathinfo，不区分大小写
    'allow_pathinfo' => [
        'index/index/index'
    ],

    // 阿里云日志配置相关，具体配置读.env配置
    'aliyun_log' => [
        'project' => env('aliyun_log.project'),
        'log_store' => env('aliyun_log.log_store'),
        'end_point' => env('aliyun_log.end_point'),
        'access_key_id' => env('aliyun_log.access_key_id'),
        'access_key' => env('aliyun_log.access_key'),
        'topic' => env('aliyun_log.topic'),
    ],

];
