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
}