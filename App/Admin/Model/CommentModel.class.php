<?php
namespace Admin\Model;
use Think\Model;
/**
 * 评论模型 
 */
class CommentModel extends Model {


	// 新增数据
	protected $insertFields = 'option,content,location,name,add_time';

	// 编辑数据
	protected $updateFields = 'option,content,location,name,add_time';

    //验证规则    
    protected $_validate = array(
        array('option','require','印象不能为空',1),
        array('content','require','内容不能为空',1),  
    );



    //插入之前
    public function _before_insert(&$data, $option){

        $data['add_time']=time();
        $data['from_id']=session('id'); 

        if( $data['from_id']==$data['to_id'] ){
            $this->error="你不能评论自己";
            return false;
        }
        // die(  dump($data)  );  
    }


    /*[_after_insert 插入之后]*/
    public function _after_insert($data, $option){      

    }

    /*[_after_update 更新之后]*/
    public function _after_update($data, $option){        

    }


    //更新之前
    public function _before_update(&$data, $option){
        
    }



    //删除之前
    public function _before_delete($option){
        // logs('删除 id 为 '.$option['where']['id'].' [ 轮播图片 ] ');

    }



    //根据用户获取列表
    public function getList($perPage=10){

        $where['to_id']=I('get.uid');
        $where['option']=I('get.option');

        if( empty($where['option']) ){
            unset($where['option']);
        }  

        //取出总条数
        $count=$this->where($where)->count();

        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page  = new \Think\Page($count,$perPage); 

        //设置
        $Page->setConfig('first','首页');
        $Page->setConfig('last','尾页');    
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');

        $pageShow = $Page->show(); // 分页显示输出    
        $limit=$Page->firstRow.','.$Page->listRows;    //limit的值

        $data=$this->field('a.*,b.head,b.nickname,b.area')
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