<?php


namespace log;


interface LogInterface
{
    public function writeLog(string $topic, array $array): bool;
    public function setProject(string $project): void;
    public function setLogStore(string $logStore): void;
}