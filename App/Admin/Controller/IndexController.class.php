<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends PublicController {
    public function index(){

    	$menu=D('Node')->getList();
		$this->assign(array(
			'menuA' =>	$menu['menuA'] , 
			'menuB' =>	$menu['menuB'] , 
		));

        $this->display();
    }

    public function intro(){
    	$this->display();
    }

}