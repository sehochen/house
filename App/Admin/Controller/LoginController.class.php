<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function index(){
        $this->display();
    }


    public function verify(){
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify =     new \Think\Verify($config);
        $Verify->entry();        
    }


    /**
     * [login 登录]
     * @return [type] [description]
     */
    public function login(){

        $model=D('admin');
        
        //检测验证码
        $model->check_verify( I('post.verify/s') ) || $this->error('验证码错误'); ;

       // 接收表单并且验证表单
       if($model->validate($model->_login_validate )->create( )){
           if($model->login()){
                $this->success('登录成功!', U('Index/index'));
                exit;
           }else{
                $this->error($model->getError()); 
           }
        }else{
           $this->error($model->getError());   
        }

    }

    public function loginOut(){
        //保存到session
        session('uid',null);
        session('name',null);
        $this->redirect('Login/index');
    }





}