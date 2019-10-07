<?php
namespace core\lib\adapter\log;

Class fileSystem
{
    static private $logDir;
    static public function getLogDir()
    {
        /**
         * 获取记录目录
         * 1.检测目录是否存在
         * 2.不存在　>　创建目录
         */
        if(!self::$logDir) {
            $config = \core\lib\config::get('file_system', 'log');
            $logDir = $config['options']['dir'];
            if (!is_dir($logDir)) {
                mkdir($logDir, 0777, true);
            }
            if (!is_writable($logDir)) {
                trigger_error('调试目录无写权限， 请让目录：' . $debugDir . '有写权限，以便方便调试');
            }
            self::$logDir = $logDir;
        }
        return self::$logDir;
    }

    static public function log($content, $filename='log')
    {
        $file = self::getLogDir() . DIRECTORY_SEPARATOR . $filename.'_'.date('Y-m-d') . '.log';
//        p($file);die;
        if(!is_file($file)){
            touch($file);
            #@todo 不生效？
            chmod($file, 0777);
        }
        file_put_contents($file,date('Y-m-d H:i:s').'  '.json_encode($content).PHP_EOL,FILE_APPEND);
    }
}