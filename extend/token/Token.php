<?php

namespace token;


interface Token
{

    /**
     * 生成token
     * @param string $data
     * @param int $expireSecond
     * @return string
     */
    public function set(string $data, int $expireSecond = 0) : string;

    /**
     * 根据token获取绑定数据
     * @param string $token
     * @return mixed
     */
    public function get(string $token);

}