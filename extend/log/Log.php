<?php


namespace log;


use log\drivers\aliyun\AliyunLog;

class Log
{
    public static function getLogger($option = []): LogInterface
    {
        $log = new AliyunLog($option);
        return $log;
    }
}