<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {

    //初始化
    function _initialize(){
        
        //判断session id是否存在
        if( session('uid') ){
        	
        	if( session('uid') !=1 ){
	        	$node_ids=M('admin')->alias('a')
	        	->join('left join __ROLE__ as b on a.role_id=b.id')
	        	->where( array('a.id'=>session('uid')) )
	        	->find();

	        	$node_ids=$node_ids['node_ids']; 

	        	$menu=M('node')->field('controller,action')
	        	->where("id in($node_ids)")
	        	->select();

	        	$url=array('Index/index','Index/intro','Index/help');
	        	foreach ($menu as $k => $v) {
	        		$url[]= $v['controller'].'/'.$v['action'];
	        	}

	        	$cur=CONTROLLER_NAME.'/'.ACTION_NAME;

	        	if( !in_array($cur, $url) ){
	        		$this->error('你没有权限访问',U('Index/index'));
	        	}        		
        	}

           
        }else{
            $this->redirect('Login/index'); //跳转到登陆页面
        }
    }
    



}