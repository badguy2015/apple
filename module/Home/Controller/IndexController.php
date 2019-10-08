<?php

namespace Home\Controller;

Class IndexController extends \core\base
{
    public function indexAction()
    {
        p('/home/index/index/');
        $data = 'hello';
        $this->assign('data', $data);
        $this->display();

    }

   	public function modelAction()
   	{
   		// include(ROOT.'/module/Model/UserModel.php');
        // $model = new \core\lib\model();
        $model = new \Model\UserModel();
        // $model->table = 'user';
        $result = $model->getList();
        $result2 = $model->getOneById(2);
        p($result);
        p($result2);
        die();
   	}
}