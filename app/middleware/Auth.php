<?php
// 用户于权限认证

namespace app\middleware;

use token\Factory;
use token\driver\TpCache;

class Auth
{
    public function handle($request, \Closure $next)
    {
        $pathInfo = $request->pathinfo();
        if (!$this->checkPath($pathInfo)) {
            $token = $request->get('token');
            if (is_null($token)) {
                return code([], 1000, 'token不存在');
            }
            if ($this->checkToken($token) === false) {
                return code([], 1000, 'token不合法');
            }
        }
        return $next($request);
    }

    private function checkToken($token)
    {
        $t = Factory::instance(TpCache::class);
//        var_dump($t->set('{"name":"liupei"}', 3600));
        $info = $t->get($token);
        if (empty($info)) {
            return false;
        }
        return $info;
    }

    private function checkPath($pathInfo)
    {
        $allowPathInfo = config('app.allow_pathinfo');
        return in_array(strtolower($pathInfo), $allowPathInfo);
    }
}