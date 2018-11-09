<?php
namespace Admin\Model;
use Think\Model;
/**
 * 日志模型 
 */
class LogModel extends Model {

	// 新增数据
	protected $insertFields = 'uid,desc';
	    // 编辑数据
	protected $updateFields = 'uid,desc';
    //验证规则    
    protected $_validate = array(
        array('uid','require','用户名不能为空',1),
        array('desc','require','描述不能为空',1),
    );

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