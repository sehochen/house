<?php
namespace Admin\Model;
use Think\Model;
/**
 * 角色模型
 */
class RoleModel extends Model {
    // 新增数据
    protected $insertFields = 'name,node_ids,remark';
    // 编辑数据
    protected $updateFields = 'name,node_ids,remark'; 

    //验证规则    
    protected $_validate = array(
        array('name','require','名称不能为空',1),
        array('remark','require','备注不能为空',1),
    );

    //自动完成
    protected $_auto = array ( 
        array('add_time','time',1,'function'),
    );    

    //插入之前
    public function _before_insert(&$data, $option){
    	$data['node_ids']=implode(',', $data['node_ids']);
    	$data['add_time']=time();
        // rtrim($s,',')
    }

    /**
     * [_after_insert 插入之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_insert($data, $option){
        
        $name=$this->where( array("id"=>$data['id']) )->field('name')->find();
        logs('添加 [ '.$name['name'].' ] 角色');
    }


    /**
     * [_before_update 更新之前]
     * @param  [type] &$data  [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _before_update(&$data, $option){
        $data['node_ids']=implode(',', $data['node_ids']);
    }

    /**
     * [_after_update 更新之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_update($data, $option){        
        $name=$this->where( array("id"=>$data['id']) )->field('name')->find();
        logs('修改 [ '.$name['name'].' ] 角色');

    }

    /**
     * [_after_delete 删除之前]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _before_delete($option){
        $name=$this->where( array("id"=>$option['where']['id']) )->field('name')->find();
        logs('删除 [ '.$name['name'].' ] 角色');  
    }




    public function getAll(){
    	return $this->select();
    }

}