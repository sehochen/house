<?php
namespace Admin\Model;
use Think\Model;
/**
 * 日志模型 
 */
class UserModel extends Model {

	// 新增数据
	protected $insertFields = 'id,username,password,password_confirm,email,phone,status';
	    // 编辑数据
	protected $updateFields = 'id,username,password,password_confirm,email,phone,status';

    //验证规则    
    protected $_validate = array(       
        array('username','','帐号名称已经存在！',0,'unique',1), 
        array('username','require','用户名不能为空',1),
        array('password','require','密码不能为空',1),
        array('password_confirm','require','确认密码不能为空',1),
        array('email','require','邮箱不能为空',1),
        array('phone','require','手机号不能为空',1),
        array('password','password_confirm','两次密码不一致',0,'confirm'),
        array('email','email','邮箱格式不对',1),
    );

    //插入之前
    public function _before_insert(&$data, $option){
        $data['reg_time']=time();
        $data['status']=0;
        $data['password']=md5($data['password']);
    }

    //插入之后
    public function _after_insert($data, $option){
        $data2['uid']=$data['id'];
        $data2['phone']=I('post.phone');
        $data2['email']=I('post.email');
        $data2['area']='暂未填写';
        $data2['nickname']='暂未填写';
        M('userinfo')->add($data2);               
    }


    // 为登录的表单定义一个验证规则 
    public $_login_validate = array(
        array('username', 'require', '用户名不能为空！', 1),
        array('password', 'require', '密码不能为空！', 1),
    );  


    //登陆
    public function login(){
        // 从模型中获取用户名和密码
        $username = I('post.username');
        $password = md5( I('post.password') );

        // 先查询这个用户名是否存在
        $user = $this->where(array('username' => array('eq', $username),))->find();

        if($user){
            if($user['password'] == $password){
                //保存到session
                session('id',$user['id']);
                session('username',$user['username']);
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








    // 获取全部
	public function getAll($perPage=10){
 
        //取出总条数
        $count=$this->count();

        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page       = new \Think\Page($count,$perPage); 

        //设置
        $Page->setConfig('first','首页');
        $Page->setConfig('last','尾页');    
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');

        $pageShow       = $Page->show(); // 分页显示输出    
        $limit=$Page->firstRow.','.$Page->listRows;    //limit的值

        $data=$this->limit($limit)->select();
        /****************返回数据**********************************/
            return array(
                'data' => $data,
                'page' => $pageShow
            );
	}


}