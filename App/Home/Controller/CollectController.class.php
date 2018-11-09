<?php
namespace Home\Controller;
use Think\Controller;
class CollectController extends PublicController {


    public function index(){
    	$list=D('Admin/Collect')->getList();
    	// dump($list);
 	    $this->assign(array(
	    	'list'	=>	$list['data'],
	    	'page'	=>	$list['page']
	    ));   	
        $this->display();
    }

    //添加
    public function add(){

    	if( IS_POST ){
  
            $model=D('Admin/Collect');
            $data=I('post.');

            if( $model->create($data,1) ){
                if($model->add($data)){

                    $this->ajaxReturn(array(
                        'message'   =>  '收藏成功',
                        'status'    =>  1
                    ) );

                	// $this->success('添加成功！',U('House/index')) && exit();
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

    	}


    }

    //删除
    public function cancel($id){
        if( D('Admin/Collect')->delete($id) ){
                    $this->ajaxReturn(array(
                        'message'   =>  '取消成功',
                        'status'    =>  1
                    ) );
        }else{
                    $this->ajaxReturn(array(
                        'message'   =>  '取消成功',
                        'status'    =>  0
                    ) );
        }
    }





}