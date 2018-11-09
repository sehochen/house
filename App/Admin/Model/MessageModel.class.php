<?php
namespace Admin\Model;
use Think\Model;
/**
 * 预约模型 
 */
class MessageModel extends Model {


	// 新增数据
	// protected $insertFields = 'hid';

	// 编辑数据
	// protected $updateFields = 'hid';

    //验证规则    
    protected $_validate = array(
        // array('hid','require','房子id不能为空',1),  
    );



    //插入之前
    public function _before_insert(&$data, $option){

        $data['add_time']=time();
        $data['uid']=session('id');

    }


    //删除之前
    public function _before_delete($option){

    }



    //根据用户获取列表
    public function getList($perPage=10){

        $where['a.from_id']=session('id');

        //取出总条数
        $count=$this->field('a.*,b.nickname,b.head')
        ->alias('a')
        ->join('left join __USERINFO__ as b on a.to_id=b.uid')
        ->where($where)
        ->count();

        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page  = new \Think\Page($count,$perPage); 

        //设置
        $Page->setConfig('first','首页');
        $Page->setConfig('last','尾页');    
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');

        $pageShow = $Page->show(); // 分页显示输出    
        $limit=$Page->firstRow.','.$Page->listRows;    //limit的值

        $data=$this->field('a.*,b.nickname,b.head')
        ->alias('a')
        ->join('left join __USERINFO__ as b on a.from_id=b.uid')
        ->where($where)
        ->limit($limit)
        ->order('add_time asc')
        ->select();
        /****************返回数据**********************************/
            return array(
                'data' => $data,
                'page' => $pageShow
            );
    }




}