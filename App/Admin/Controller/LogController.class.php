<?php
namespace Admin\Controller;
use Think\Controller;
class LogController extends PublicController {

    public function index(){
        $list=D('Log')->getAll();
		$this->assign(array(
			'list' =>	$list['data'] , 
			'page' =>	$list['page'] , 
		));
        $this->display();
    }


    //按时间清除
    public function clear($time){
    	
    	$times=time();
    	$timee=time()-$time*86400;
    	$map['time']  = array( "between",array( $timee, $times) ) ;
    	$res=D('Log')->where($map)->delete();
    	if($res){
    		$this->success('清除成功','index');
    	}else{
    		$this->error('清除失败！');
    	}
    }

    //选择清除
    public function clears(){
    	$ids=implode(',', I('post.id'));
    	$map['id']  = array( "in",$ids);
    	$res=D('Log')->where($map)->delete();
    	if($res){
    		$this->success('清除成功','index');
    	}else{
    		$this->error('清除失败！');
    	}
    }


}