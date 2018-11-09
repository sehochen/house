<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends PublicController {

    public function index(){
        $list=D('Role')->getAll();
        $this->assign('list',$list)->display();
    }

    /**
     * [add 添加]
     */
    public function add(){
        if(IS_POST){
            $model=D('Role');
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Role/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $menu=D('Node')->getList();
            $this->assign(array(
                'menuA' =>  $menu['menuA'] , 
                'menuB' =>  $menu['menuB'] , 
            ));
            $this->display();            
        }

    }



    /**
     * [edit 编辑]
     */
    public function edit($id){
        if(IS_POST){
            $model=D('Role');
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Role/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $menu=D('Node')->getList();
            $info=D('Role')->find($id);
       
            $this->assign(array(
                'menuA' =>  $menu['menuA'] , 
                'menuB' =>  $menu['menuB'] ,
                'info'  =>  $info, 
            ));
            $this->display();            
        }

    }



    /**
     * [del 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function del($id){  
        if( D('Role')->delete($id) ){
            $this->success('删除成功！',U('Role/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }




}