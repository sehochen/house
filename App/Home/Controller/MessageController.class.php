<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends PublicController {


    public function index(){
    	$list=D('Admin/Message')->getList();
    	// dump($list);
 	    $this->assign(array(
	    	'list'	=>	$list['data'],
	    	'page'	=>	$list['page']
	    ));   	
        $this->display();
    }


    //删除
    public function cancel($id){
        if( D('Admin/Message')->delete($id) ){
                    $this->ajaxReturn(array(
                        'message'   =>  '删除成功',
                        'status'    =>  1
                    ) );
        }else{
                    $this->ajaxReturn(array(
                        'message'   =>  '删除成功',
                        'status'    =>  0
                    ) );
        }
    }





}