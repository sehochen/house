<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends PublicController {

    public function index(){
	    $info=M('userinfo')->find( I('get.uid') );
	    // dump($info);
	    $list=D('Admin/Comment')->getList();
	    // dump($list);
	    $this->assign(array(
	    	'info'	=>	$info,
	    	'list'	=>	$list['data'],
	    	'page'	=>	$list['page']
	    ));
	    $this->display();     	
    }

    //评价
    public function add(){

    	if( IS_POST ){
    		$uid=I('post.to_id');

            $model=D('Admin/Comment');
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->ajaxReturn(array(
                        'message'   =>  '添加成功',
                        'status'    =>  1
                    ) );
					exit();
                }else{
                    $this->ajaxReturn(array(
                        'message'   =>  $model->getError() ,
                        'status'    =>  0
                    ));
                }
            }else{
                $this->ajaxReturn(array(
                    'message'   =>  $model->getError() ,
                    'status'    =>  0
                ));
            }    		
    	}else{
            $this->display();           
        }

    }





}