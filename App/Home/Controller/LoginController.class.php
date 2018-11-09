<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function index(){
        $this->display();
    }

    public function register(){
        if(IS_POST){
            $model=D('Admin/User');
            $data=I('post./a');
            if( $model->create($data,1) ){

                if($model->add($data)){
                    $this->ajaxReturn(array(
                        'message'   =>  '添加成功',
                        'status'    =>  1
                    ) );
                    // $this->success('添加成功！',U('Login/index')) && exit();
                }
            }else{
                
                $this->ajaxReturn(array(
                    'message'   =>  $model->getError() ,
                    'status'    =>  0
                ));
                // $this->error( $model->getError() );
            }            
        }
        $this->display();
    } 

    //找回密码
    public function forget(){
        $this->display();
    } 



    /**
     * [login 登录]
     * @return [type] [description]
     */
    public function login(){

        $model=D('Admin/User');
        

       // 接收表单并且验证表单
       if($model->validate($model->_login_validate )->create( )){
           if($model->login()){
                // $this->success('登录成功!', U('Index/index'));
                $this->ajaxReturn(array(
                    'message'   =>  '登录成功' ,
                    'status'    =>  1
                ));

                exit;
           }else{

                $this->ajaxReturn(array(
                    'message'   =>  $model->getError() ,
                    'status'    =>  0
                ));

                // $this->error($model->getError()); 
           }
        }else{

                $this->ajaxReturn(array(
                    'message'   =>  $model->getError() ,
                    'status'    =>  0
                ));
           // $this->error($model->getError());   
        }

    }

    public function loginOut(){
        //保存到session
        session('id',null);
        session('username',null);
        $this->redirect('Login/index');
    }














}
