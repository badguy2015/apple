<?php
namespace core\lib;

Class config
{
    static public $conf=[];

    static public function init()
    {
        p('init is work!');
        die;
    }

    static public function get($name,$file)
    {
        /**
         * $name=action,$file=route
         * >> include '/core/config/route.php';
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        $path = ROOT.'/core/config/'.$file.'.php';
//        p($path);
        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else{
            if(is_file($path)){
                $config = include $path;
                if(isset($config[$name])||$name='ALL'){
                    self::$conf[$file] = $config;
                    return $name==='ALL'?$config:$config[$name];
                }else{
                    throw new \Exception('配置项不存在！');
                }
            }else{
                throw new \Exception('配置文件不存在！');
            }
        }
    }

    static public function getAll($file)
    {
        return self::get('ALL',$file);
    }
}