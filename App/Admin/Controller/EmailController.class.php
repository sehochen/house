<?php
namespace Admin\Controller;
use Think\Controller;
class EmailController extends PublicController {

    public function index(){

        if(IS_POST){

            write_config( I('post.') ) && $this->success('修改成功') ;
            die( logs('修改 [ 邮箱 ] 配置') );
        }
        $info=C('EMAIL');
        $this->assign('info',$info)->display();
    }


}