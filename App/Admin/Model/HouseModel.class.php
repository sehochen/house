<?php
namespace Admin\Model;
use Think\Model;
/**
 * 轮播模型 
 */
class HouseModel extends Model {


	// 新增数据
	protected $insertFields = 'rent,name,number,floor,nums,type,direction,area,money,decoration,room_type,clapboard,pay_ren,facilities,demand,location,street,add_time';

	// 编辑数据
	protected $updateFields = 'uid,rent,name,number,floor,nums,type,direction,area,money,decoration,room_type,clapboard,pay_ren,facilities,demand,location,street,add_time';

    //验证规则    
    protected $_validate = array(
        array('name','require','名称不能为空',1),
        array('number','require','楼号不能为空',1),
        array('floor','require','楼层不能为空',1),
        array('nums','require','门牌号不能为空',1),    
    );



    //插入之前
    public function _before_insert(&$data, $option){
        $data['add_time']=time();
        $data['facilities']=implode(",",$data['facilities']);
        $data['demand']=implode(",",$data['demand']);
        $data['uid']=session('id'); 
        $data['type']=I('post.type1').'室'.I('post.type2').'厅'.I('post.type3').'卫';      
    }


    /**
     * [_after_insert 插入之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_insert($data, $option){      

        if( $_FILES['img']['error'][0] ==0 ){
            $res['img']=uploads();
            
            $data['hid']=$data['id'];
            foreach ($res['img'] as $k => $v) {
                $data['path']=$v;
                 M('house_img')->add($data);
            }
           
        }else{
            $this->error="你还没有选择图片";
        }

    }

    /**
     * [_after_update 更新之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_update($data, $option){        
        // logs('修改 id 为 '.$option['where']['id'].' [ 轮播图片 ] ');

    }


    //更新之前
    public function _before_update(&$data, $option){

        if( $_FILES['img']['error'] ==0 ){
            $res=$this->field('img')->find( $option['where']['id'] );
            $path=C('UPLOAD')['rootPath'].$res['img'];            
            if( !unlink($path) ){
                $this->error="删除失败!";
            }
            $data['img']=upload();
        }
        
    }



    //删除之前
    public function _before_delete($option){
        $res=$this->field('img')->find( $option['where']['id'] );
        $path=C('UPLOAD')['rootPath'].$res['img'];           
        if( !unlink($path) ){
            $this->error="删除失败!";
        }
        // logs('删除 id 为 '.$option['where']['id'].' [ 轮播图片 ] ');

    }


    //根据用户获取列表
    public function getUser($perPage=10){
        $where['uid']=session('id');
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

        $data=$this->field('a.*,GROUP_CONCAT(b.path) as img')
        ->alias('a')
        ->group('b.hid')
        ->join('left join house_img as b on a.id=b.hid')
        ->where($where)
        ->limit($limit)
        ->select();
        /****************返回数据**********************************/
            return array(
                'data' => $data,
                'page' => $pageShow
            );
    }


    //获取最新的10条
    public function getNew($perPage=10){

        return $this->field('a.*,GROUP_CONCAT(b.path) as img')
        ->alias('a')
        ->group('b.hid')
        ->join('left join __HOUSE_IMG__ as b on a.id=b.hid')
        ->order('add_time desc')
        ->limit('0,10')
        ->select();

    }


    //获取房子信息
    public function getInfo($id){

        return $this->field('a.*,GROUP_CONCAT(b.path) as img,c.nickname,c.head,c.phone')
        ->alias('a')
        ->group('a.id')
        ->join('left join __HOUSE_IMG__ as b on a.id=b.hid')
        ->join('left join __USERINFO__ as c on a.uid=c.uid')
        ->where( array( 'a.id'=>$id ) )
        ->find();

    }


    //根据用户获取列表
    public function getAll($perPage=10){
        $where=array();
        
        //接受搜索的关键字 
        I('get.name') && $where['a.name']=array( 'like','%'.I('get.name').'%' )  ;
        I('get.location') && $where['a.location']=array( 'like','%'.I('get.location').'%' )  ;
        I('get.rent') && $where['rent']=array( 'eq',I('get.rent'))  ;

        /*价格区间***************************************************************/
        $money=explode(',', I('get.money')) ;
        if( I('get.money') ){
           $where['a.money']=array("between",array(  $money[0], $money[1] ));
        }

        //排序
        $order='a.id asc';    //默认从低到高
        I('get.order') &&  $order= str_replace('+',' ',I('get.order/s') ); //查找替换+

        //取出总条数
        $count=$this
        ->field('a.*,GROUP_CONCAT(b.path) as img')
        ->alias('a')
        ->group('b.hid')
        ->join('left join house_img as b on a.id=b.hid')
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

        $data=$this->field('a.*,GROUP_CONCAT(b.path) as img')
        ->alias('a')
        ->group('b.hid')
        ->join('left join house_img as b on a.id=b.hid')
        ->where($where)
        ->order($order)
        ->limit($limit)
        ->select();
        /****************返回数据**********************************/
            return array(
                'data' => $data,
                'page' => $pageShow
            );
    }



}