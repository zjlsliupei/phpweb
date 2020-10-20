<?php


namespace token\driver;

use think\Facade\Cache;
use token\Factory;

class TpCache implements \token\Token
{
    public function set(string $data, int $expireSecond = 0) : string
    {
        $token = Factory::createUniqId();
        $res = Cache::set($token, $data, $expireSecond);
        if ($res) {
            return $token;
        } else {
            return "";
        }
    }

    public function get(string $token)
    {
        return Cache::get($token);
    }
}