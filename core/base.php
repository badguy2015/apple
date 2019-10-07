<?php
namespace core;

Class base
{
    static private $classMap = [];
    public $assign = [];

	static public function run()
	{
	    /*
	    // 数据库链接测试 mysqld
        $model = new \core\lib\model();
	    $sql = "SELECT * FROM user WHERE id>0";
	    $result = $model->query($sql);
	    p($result->fetchAll());
	    exit;
	    */
	    /*
        // 配置TEST
        $result1 = \core\lib\config::getAll('route');
        $result3 = \core\lib\config::get('host','database');
        p($result1);
        p($result3);
        exit;
        */
	    /*
        // 日志测试
        \core\lib\log::log('someTestString');
        \core\lib\log::log(['A','B','C']);
	    */

        //路由
        $route = \core\lib\route::getInstance();
        $module = $route->module;
        $controller = $route->controller;
        $action = $route->action;
        /**
         * apple.local/home/login/index
         * >>$controllerFile: ROOT/module/Home/Controller/LoginController/indexAction
         * >>$controllerClass: new \Home\Controller\LoginController();
         */
        $controllerFile = ROOT.'/module/'.$module.'/Controller/'.$controller.'Controller.php';
        $controllerClass = '\\'.$module.'\Controller\\'.$controller.'Controller';
//        p($controllerFile);
//        p($controllerClass);die;
        // 加载控制器,方法
        if(is_file($controllerFile)){
            include $controllerFile;
            $controllerObj = new $controllerClass();
            $realActionName = $action.'Action';
            $controllerObj->$realActionName();
        }else{
            header("Location: /error/index/_404Home");
//            throw new \Exception('404_页面不存在');
        }

	}

    /**
     * 自动加载类库（仅加载/core/lib文件夹下的类库）
     *
     * @param $class
     */
	static public function load($class)
	{
        // $class = core\lib\route
        // include ROOT/core/lib/route;
        // new \core\route();
        // $class = \core\rote
        if(isset(self::$classMap[$class])){
//            p(self::$classMap);
            return;
        }else{
            $classPath = str_replace('\\','/',$class);
            $path = ROOT.'/'.$classPath.'.php';
            if(is_file($path)){
                include $path;
                self::$classMap[$class] = true;
            }
        }
	}

	public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

	public function display($file=null)
    {
        /**
         * login/index
         * >> ROOT.'/module/{Home}/View/Login/index.phtml'
         */
        $route = \core\lib\route::getInstance();
        $module = $route->module;
        if($file){
            list($controller,$action) = explode('/',$file);
        }else{
            $controller = $route->controller;
            $action = $route->action;
        }
        $filePath = ROOT.'/module/'.$module.'/View/'.$controller.'/'.$action.'.phtml';
        if(is_file($filePath)) {
            extract($this->assign);
            include $filePath;
        }
    }

}