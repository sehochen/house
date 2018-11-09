<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends PublicController {

    public function index(){
    	$info=M('userinfo')->find( session('id') );
        $this->assign('info',$info)->display();   
    }

    //信息
    public function info(){
    	if( IS_POST ){
            $model=D('Admin/Userinfo');
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->ajaxReturn(array(
                        'message'   =>  '修改成功',
                        'status'    =>  1
                    ) );                	
                }else{
                    $this->ajaxReturn(array(
                        'message'   =>  '修改成功',
                        'status'    =>  1
                    ) ); 
                }
            }else{
                $this->ajaxReturn(array(
                    'message'   =>  $model->getError() ,
                    'status'    =>  0
                ));
            }

    	}else{
	    	$info=M('userinfo')->find( session('id') );
	        $this->assign('info',$info)->display();        		
    	}

    }


    //上传头像
    public function head(){

        $info=D('userinfo')->field('head')->find( session('id') );
        $path=C('UPLOAD')['rootPath'].$info['head']; 
 
       is_file($path) &&  unlink($path);   
 		
        $data['head']=upload();

        D('userinfo')->where(array('uid'=>session('id')))->save($data);
  	
    }

    //上传头像
    public function headinfo(){

        $info=D('userinfo')->field('head')->find( session('id') );

        $this->ajaxReturn(array(
            'message'   =>  $info['head'] ,
        ));        
  	
    }




}