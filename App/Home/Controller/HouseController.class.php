<?php
namespace Home\Controller;
use Think\Controller;
class HouseController extends PublicController {

    public function index(){
    	$list=D('Admin/House')->getUser();

		$this->assign(array(
			'list' =>	$list['data'] , 
			'page' =>	$list['page'] , 
		));    	
        $this->display();
    }

    //添加
    public function add(){
    	if( IS_POST ){
            $model=D('Admin/House');
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    // $this->success('添加成功！',U('House/index')) && exit();
                    $this->redirect( U('House/index') );
					exit();
                }
            }else{
                $this->error( $model->getError() );
            }    		
    	}else{
            $this->display();           
        }
        
    }

    //信息
    public function info($id){
    	$info=D('Admin/House')->getInfo($id);
        $comment=D('Comment')->where( array('to_id'=>$info['uid']) )->count(); 

		$this->assign(array(
			'info' =>	$info, 
            'count' =>  $comment
		));    	
        $this->display();
    }


    public function lists(){
    	$list=D('Admin/House')->getAll();

		$this->assign(array(
			'list' =>	$list['data'] , 
			'page' =>	$list['page'] , 
		));       	
    	$this->display();
    }


}