<?php


namespace token;


class Factory
{
    public static function instance($class) : \token\Token
    {
        return new $class();
    }

    public static function createUniqId()
    {
        $uniqid = uniqid();
        $uniqid = str_replace('.', '', $uniqid);
        $unString = base_convert($uniqid, 16, 36);
        // 补足17位
        return str_pad($unString, 17, rand(1,9999999));
    }
}