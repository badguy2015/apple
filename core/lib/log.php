<?php
namespace core\lib;

Class log
{
    static $logger;

    /*
     * 由于日志可记录于file,database,cache等，所以，在日志记录前就需要确定一种记录方式，此处使用log.php配置
     * 1.选择记录方式
     * 2.记录日志
     * */
    /**
     * @return string
     */
    static public function getLogger()
    {
        if(!self::$logger){
            $logConfig = \core\lib\config::getAll('log');
            $logType = $logConfig['default'];
            $logAdapter = '\core\lib\adapter\log\\'.$logConfig[$logType]['adapter'];
            $adapterFilePath = CORE.'/lib/adapter/log/'.$logConfig[$logType]['adapter'].'.php';
            switch($logType){
                /*case 'file_system':
                    include $adapterFilePath;
                    break;
                case 'redis':
                    include $adapterFilePath;
                    break;
                case 'memory':
                    include $adapterFilePath;
                    break;
                case 'mysql':
                    include $adapterFilePath;
                    break;*/
                default:
                    include $adapterFilePath;
                    self::$logger = $logAdapter;
                    break;
            }
        }
        return self::$logger;
    }

    static public function log($content)
    {
        $logger = self::getLogger();
        return $logger::log($content);
    }
}