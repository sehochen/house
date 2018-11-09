<?php
namespace Admin\Model;
use Think\Model;
/**
 * 预约模型 
 */
class AppointmentModel extends Model {


	// 新增数据
	protected $insertFields = 'other,remark,hid,time';

	// 编辑数据
	protected $updateFields = 'other,remark,hid,time';

    //验证规则    
    protected $_validate = array(
        array('hid','require','房子id不能为空',1),  
        array('time','require','预约时间不能为空',1),  
    );



    //插入之前
    public function _before_insert(&$data, $option){

        $data['time']=strtotime( $data['time'] );
        $data['other']=implode(",",$data['other']);
        $data['uid']=session('id');

        $info=M('House')->field('uid,name')->find( $data['hid'] );
        $house=$this->field('uid')->where( array('hid'=> $data['hid'] ) )->find();

        if( $info['uid']==session('id') ){
            $this->error="你不能预约自己的房子";
            return false;
        }else if( $data['hid']==$house['hid'] ){
            $this->error="你已经预约过此房子了";
            return false;
        }



        //生产url
        $id=explode('/', $_SERVER['PATH_INFO']);
        $id=$id[count($id)-1];
        $url=$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'/House/info/id/'.$id;

        //预约者信息
        $userinfo=M('userinfo')->field('email,nickname')->where( array('uid'=>session('id')) )->find();

        //接受者信息 房东
        $toinfo=M('house')->field('b.uid,b.email,b.nickname')
        ->alias('a')
        ->join('left join __USERINFO__ as b on a.uid=b.uid')
        ->where( array('id'=>$data['hid'] ) )
        ->find();

        //信息表记录
        M('message')->add(array(
            'to_id'     =>  $toinfo['uid'],
            'from_id'   =>  session('id'),
            'content'   =>  '你已经成功预约<a href="'.$url.' ">'.$info['name'].'</a>',
            'add_time'  =>  $data['time'],
        ));



        //发送给预约者
        email($userinfo['email'],'你已经成功预约 '.$info['name'],'<strong>尊敬的 '.$userinfo['nickname'].'：</strong><br>&nbsp;&nbsp;你已经成功预约 &nbsp;&nbsp; <a href=" '.$url.' ">'.$info['name'].'</a><br>&nbsp;&nbsp;请记住预约时间<hr><span style="float:right">预约时间：'.date('Y-m-d H:i',$data['time']).'</span>'  );

        //接受者信息 房东
        email($toinfo['email'],$userinfo['nickname'].'已经成功预约你发布的'.$info['name'],'<strong>尊敬的 '.$toinfo['nickname'].'：</strong><br>&nbsp;&nbsp;'.$userinfo['nickname'].'已经成功预约你发布的 &nbsp;&nbsp; <a href=" '.$url.' ">'.$info['name'].'</a><br>&nbsp;&nbsp;请记住他的预约时间<hr><span style="float:right">预约时间：'.date('Y-m-d H:i',$data['time']).'</span>'  );

        // echo $url;
        // dump($_SERVER);
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