<?php
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends PublicController {

    public function index(){

        if(IS_POST){
            $model=D('Config');
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Config/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{       
            $info=D('Config')->find(1);
            $this->assign('info',$info)->display();           
        }

    }


}