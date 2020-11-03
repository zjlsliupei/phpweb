<?php
namespace log\drivers\aliyun;

use log\LogInterface;

require_once realpath(dirname(__FILE__) . '/Log_Autoload.php');

class AliyunLog implements LogInterface
{
    private $project = '';
    private $logStore = 'http-request';
    private $client = null;

    public function __construct($option)
    {
        $this->project = $option['project'];
        $this->logStore = $option['log_store'];
        $this->client = new \Aliyun_Log_Client($option['end_point'],  $option['access_key_id'], $option['access_key']);
    }

    public function setProject(string $project): void
    {
        $this->project = $project;
    }

    public function setLogStore(string $logStore): void
    {
        $this->logStore = $logStore;
    }

    public function writeLog(string $topic, array $contents): bool
    {
        $logItem = new \Aliyun_Log_Models_LogItem();
        $logItem->setTime(time());
        $logItem->setContents($contents);
        $logitems = array($logItem);
        $request = new \Aliyun_Log_Models_PutLogsRequest($this->project, $this->logStore,
            $topic, null, $logitems);

//        try {
            $response = $this->client->putLogs($request);
            $header = $response->getHeader("_info");
            if (isset($header['http_code']) and $header['http_code'] == 200) {
                return true;
            }
//        } catch (\Aliyun_Log_Exception $ex) {
//            echo $ex->getMessage();
//        } catch (\Exception $ex) {
//            echo $ex->getMessage();
//        }
        return false;
    }
}
