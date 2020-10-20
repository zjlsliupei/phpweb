<?php
// 应用公共文件

/**
 * 全局响应
 * @param array $data 响应数据
 * @param int $code 响应前端的状态码
 * @param string $msg 响应错误消息
 * @return \think\response\Json
 */
function code($data = [], $code = 0, $msg = 'success')
{
    $jsonData = [
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    ];
    return json()->data($jsonData)->header([
        "Access-Control-Allow-Origin" => "*"
    ]);
}

/**
 * 创建全局唯一id
 * @return string
 */
function create_unique_id()
{
    $uniqid = uniqid();
    $uniqid = str_replace('.', '', $uniqid);
    $unString = base_convert($uniqid, 16, 36);
    // 补足17位
    return str_pad($unString, 17, rand(1,9999999));
}
