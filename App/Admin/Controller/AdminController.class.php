<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends PublicController {

    public function index(){
        $list=D('admin')->getList();
        // dump($list);
        $this->assign(array(
            'data' => $list['data'],
            'page' => $list['pageShow']
        ));
        $this->display();
    }

    /**
     * [add 添加]
     */
    public function add(){
        if(IS_POST){
            $model=D('Admin');
            $data=I('post./a');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Admin/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $role=D('Role')->getAll();
            $this->assign('role',$role)->display();
        }

       
    }

    /**
     * [edit 编辑]
     * @return [type] [description]
     */
    public function edit($id){
        if(IS_POST){
            $model=D('Admin');
            $data=I('post.');
            // dump($data);
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Admin/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $role=D('Role')->getAll();
            $info=D('Admin')->find($id);
            // dump($info);
            $this->assign(array(
                'role'  =>  $role,
                'info'  =>  $info,
            ))->display();
        }

       
    }


    /**
     * [del 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function del($id){  
        $model=D('Admin');
        if( $model->delete($id) ){
            $this->success('删除成功！',U('Admin/index')) && exit();
        }else{
            $this->error($model->getError());
        }
    }




}