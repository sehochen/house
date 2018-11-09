<?php
namespace Admin\Model;
use Think\Model;
/**
 * 预约模型 
 */
class CollectModel extends Model {


	// 新增数据
	protected $insertFields = 'hid';

	// 编辑数据
	protected $updateFields = 'hid';

    //验证规则    
    protected $_validate = array(
        array('hid','require','房子id不能为空',1),  
    );



    //插入之前
    public function _before_insert(&$data, $option){

        $data['add_time']=time();
        $data['uid']=session('id');

        $info=M('House')->field('uid')->find( $data['hid'] );
        $house=$this->field('hid')->where( array('hid'=> $data['hid'] ) )->find();

        if( $info['uid']==session('id') ){
            $this->error="你不能收藏自己的房子";
            return false;
        }else if( $data['hid']==$house['hid'] ){
            $this->error="你已经收藏过此房子了";
            return false;
        }
        // dump( $data );
        // die;

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

    }



    //根据用户获取列表
    public function getList($perPage=10){

        $where['a.uid']=session('id');

        //取出总条数
        $count=$this->field('a.*,b.name,b.money,b.room_type,b.area,b.direction,b.location,b.pay_ren,b.type,b.decoration,c.path')
        ->alias('a')
        ->join('left join __HOUSE__ as b on a.hid=b.id')
        ->join('left join __HOUSE_IMG__ as c on b.id=c.hid')
        ->group('c.hid')
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

        $data=$this->field('a.*,b.name,b.money,b.room_type,b.area,b.direction,b.location,b.pay_ren,b.type,b.decoration,c.path')
        ->alias('a')
        ->join('left join __HOUSE__ as b on a.hid=b.id')
        ->join('left join __HOUSE_IMG__ as c on b.id=c.hid')
        ->group('c.hid')
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