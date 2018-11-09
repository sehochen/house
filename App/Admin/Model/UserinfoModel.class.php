<?php
namespace Admin\Model;
use Think\Model;
/**
 * 用户信息模型 
 */
class UserinfoModel extends Model {

	// 新增数据
	protected $insertFields = 'id,username,password,password_confirm,email,phone,status';
	    // 编辑数据
	protected $updateFields = 'id,username,password,password_confirm,email,phone,status';

    //验证规则    
    protected $_validate = array(       
        array('username','','帐号名称已经存在！',0,'unique',1), 
        array('email','require','邮箱不能为空',1),
        array('phone','require','手机号不能为空',1),
        array('email','email','邮箱格式不对',1),
    );

    //插入之前
    public function _before_insert(&$data, $option){

    }
 



}