<?php
namespace Admin\Model;
use Think\Model;
/**
 * 节点模型 操作节点表
 */
class NodeModel extends Model {

	//获取列表
	public function getList(){

        if( session('uid')==1 ){
            $menuA=$this->where(array('pid'=>0))->order('id asc')->select();
            $menuB=$this->where(array( 'pid'=>array('gt',0) ))->order('id asc')->select();
            return array(
                'menuA' =>  $menuA , 
                'menuB' =>  $menuB , 
            );

        }else{
            $node_ids=M('Admin')->field('node_ids')
            ->alias('a')
            ->join('left join __ROLE__ as b on a.role_id=b.id')
            ->where( array('a.id'=>session('uid')) )
            ->find();
            $node_ids=$node_ids['node_ids']; 

            $menuA=$this->where("pid=0 and id in($node_ids)")->order('id asc')->select();
            $menuB=$this->where("pid>0 and id in($node_ids)")->order('id asc')->select();   
            return array(
                'menuA' =>  $menuA , 
                'menuB' =>  $menuB , 
            );

        }



	}


	//获取列表
	public function getAll(){
		$list=$this->select();
		return $this->getTree($list,0);
	}

	//递归无限级分类
	private function getTree($data, $pid,$level=0){
	    static $tree = array();
	    foreach ($data as $k => $v) {
	    	//找父节点
	        if ($v['pid'] == $pid) {
	            $v['level'] = $level;
	            $tree[] = $v;

	            //递归调用
	            $this->getTree($data,$v['id'],$level+1);
	        }
	    }
	 
	    return $tree;
	}


   //自动完成
    protected $_auto = array ( 
        array('add_time','time',1,'function'),
    );    

    //插入之前
    public function _before_insert(&$data, $option){
    	$data['add_time']=time();
    }

    /**
     * [_after_insert 插入之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_insert($data, $option){
        
        $name=$this->where( array("id"=>$data['id']) )->field('name')->find();
        logs('添加 [ '.$name['name'].' ] 权限节点');
    }


    /**
     * [_before_update 更新之前]
     * @param  [type] &$data  [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _before_update(&$data, $option){
    }

    /**
     * [_after_update 更新之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_update($data, $option){        
        $name=$this->where( array("id"=>$data['id']) )->field('name')->find();
        logs('修改 [ '.$name['name'].' ] 权限节点');
    }

    /**
     * [_after_delete 删除之前]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _before_delete($option){
       
       //查找子级id
        $child=$this->field('id')->where( array('pid'=>$option['where']['id']) )->select();

        //有子级的话，就连子级一起删除
        if( !empty($child)){
            foreach ($child as $k=> $v) {
                $this->delete($v['id']);
            }

        }

        $name=$this->where( array("id"=>$option['where']['id']) )->field('name')->find();
        logs('删除 [ '.$name['name'].' ] 权限节点');    
    }










}