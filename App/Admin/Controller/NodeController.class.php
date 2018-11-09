<?php
namespace Admin\Controller;
use Think\Controller;
class NodeController extends PublicController {

    public function index(){
        $list=D('Node')->getAll();
        $this->assign('list',$list)->display();
    }

    /**
     * [add 添加]
     */
    public function add(){
        if(IS_POST){
            $model=D('Node');
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Node/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
	        $list=D('Node')->getAll();
	        $this->assign('list',$list)->display();  	         
        }

    }

    /**
     * [edit 添加]
     */
    public function edit($id){
        if(IS_POST){
            $model=D('Node');
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Node/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
	        $list=D('Node')->getAll();
	        $info=D('Node')->find($id);
	        dump($info);
	        $this->assign(array(
	        	'list'	=>	$list,
	        	'info'	=>	$info
	        ))->display();  	         
        }

    }


    /**
     * [del 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function del($id){  
        if( D('Node')->delete($id) ){
            $this->success('删除成功！',U('Node/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }




}