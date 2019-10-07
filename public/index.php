<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
die('here');
define('ROOT',realpath('../'));
define('RES',ROOT.'/public/res');
define('CORE',ROOT.'/core');
define('MODULE',ROOT.'/module');
define('DEBUG', true);

if(DEBUG) {
	ini_set('display_error', 'On');
}else{
	ini_set('display_error', 'Off');
}
// 加载函数库
include CORE.'/common/function.php';

// 加载框架核心文件(包含路由处理(apple.local/module/controller/action),自动加载类库（仅加载/core/lib文件夹下的类库）)
include CORE.'/base.php';

spl_autoload_register('\core\base::load');

\core\base::run();