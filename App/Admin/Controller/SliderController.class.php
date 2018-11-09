<?php
namespace Admin\Controller;
use Think\Controller;
class SliderController extends PublicController {

    public function index(){
        $list=D('Slider')->getAll();
        $this->assign('list',$list)->display();
    }


    /**
     * [add 添加]
     */
    public function add(){
        if(IS_POST){
            $model=D('Slider');
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Slider/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{

            $this->display();            
        }

    }


    /**
     * [edit 编辑]
     */
    public function edit($id){
        if(IS_POST){
            $model=D('Slider');
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Slider/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $info=D('Slider')->find($id);
            // dump($info);
            $this->assign('info',$info)->display();            
        }

    }



    /**
     * [del 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function del($id){  
        if( D('Slider')->delete($id) ){
            $this->success('删除成功！',U('Slider/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }




}