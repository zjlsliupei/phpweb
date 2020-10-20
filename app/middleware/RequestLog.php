<?php


namespace app\middleware;

use log\Log;

class RequestLog
{
    public function handle($request, \Closure $next)
    {
        $startTime = microtime(true);
        $response = $next($request);
        $endTime = microtime(true);
        $execTime = sprintf("%0.4f",$endTime - $startTime);

        $config = config('app.aliyun_log');
        $log = Log::getLogger($config);
        $responseData = $response->getData();
        $log->writeLog($config['topic'], [
            'url' => $request->url(true),
            'postData' => json_encode($request->post()),
            'httpStatus' => $response->getCode(),
            'execTime' => $execTime,
            'method' => $request->method(),
            'response' => $response->getContent(),
            'code' => $responseData['code'],
            'pathInfo' => $request->pathinfo()
        ]);

        return $response;
    }
}