<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
        // 轮播
        $slider=D('Admin/Slider')->getAll();
        //最新
        $list=D('Admin/House')->getNew();

        // dump($list);

        $this->assign(array(
            'slider'    =>  $slider,
            'list'      =>  $list
        ));
        $this->display();
    }

    //添加位置信息
    public function location(){
    	if( IS_AJAX ){
    		$location=I('post.location');
    		$status=array();
    		if(isset($location) ){
    			session('location',I('post.location'));
    			$status=array('status' =>0 , );
    		}else{
    			$status=array('status' =>1 , );
    		}

    		$this->ajaxReturn( $status );
    	}
        $this->display();
    }


}