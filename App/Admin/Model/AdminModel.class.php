<?php
namespace Admin\Model;
use Think\Model;
/**
 * 管理员模型 
 */
class AdminModel extends Model {
    // 新增数据
    protected $insertFields = 'username,password,passwords,role_id,eamil,phone,remark';
    // 编辑数据
    protected $updateFields = 'id,username,password,passwords,role_id,eamil,phone,remark';

    //验证规则    
    protected $_validate = array(
        array('username','require','用户不能为空',1),
        array('username','','帐号已经存在！',0,'unique',1),
        array('password','require','密码不能为空',1),
        array('passwords','require','确认密码不能为空',1),
        array('role_id','require','角色不能为空',1),
        array('password','passwords','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
    );

    //自动完成
    protected $_auto = array ( 
        array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
        array('create_time','time',1,'function'),
    );


    // 为登录的表单定义一个验证规则 
    public $_login_validate = array(
        array('username', 'require', '用户名不能为空！', 1),
        array('password', 'require', '密码不能为空！', 1),
        // array('verify', 'require', '验证码不能为空！', 1),
        // array('verify', 'check_verify', '验证码不正确！', 1, 'callback'),
    );  

    // 验证验证码是否正确
    function check_verify($code, $id = ''){
	    $verify = new \Think\Verify();
	    return $verify->check($code, $id);
    }  


    //登陆
    public function login(){
	    // 从模型中获取用户名和密码
	    $username = $this->username;
	    $password = $this->password;

    	// 先查询这个用户名是否存在
    	$user = $this->where(array('username' => array('eq', $username),))->find();

        if($user){
            if($user['password'] == $password){
                //保存到session
                session('uid',$user['id']);
                session('name',$user['username']);
                return TRUE;
            }else{
                $this->error = '密码不正确！';
                return FALSE;
            }
        }else {
            $this->error = '用户名不存在！';
            return FALSE;
        }
    }

    //插入之前
    public function _before_insert(&$data, $option){
        $data['create_time']=time();
        $data['password']=md5($data['password']);
    }

    //插入之后
    public function _after_insert($data, $option){
        
        $name=$this->where( array("id"=>$data['id']) )->field('username')->find();
        logs('添加 [ '.$name['name'].' ] 管理员');
    }


    /**
     * [_after_update 更新之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_update($data, $option){        
        $name=$this->where( array("id"=>$data['id']) )->field('username')->find();
        logs('修改 [ '.$name['name'].' ] 管理员');  

    }



    /**
     * [_after_delete 删除之前]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _before_delete($option){
        if($option['where']['id']==1){
            $this->error="不能删除超级管理员";
            return false;
        }

        $name=$this->where( array("id"=>$option['where']['id']) )->field('username')->find();
        logs('删除 [ '.$name['name'].' ] 管理员');       
    }



    /**
     * [_after_delete 删除之后]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_delete($option){

    }




    public function getList(){
        //取出总条数
        $count=$this->count();

        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page = new \Think\Page($count,$perPage); 

        //设置
        $Page->setConfig('first','首页');
        $Page->setConfig('last','尾页');    
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');

        $pageShow = $Page->show(); // 分页显示输出    
        $limit=$Page->firstRow.','.$Page->listRows;    //limit的值

        $data=$this->limit($limit)->select();
        /****************返回数据**********************************/
        return array(
            'data' => $data,
            'page' => $pageShow
        );


    }



}