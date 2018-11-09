<?php
namespace Admin\Model;
use Think\Model;
/**
 * 轮播模型 
 */
class SliderModel extends Model {

	// 新增数据
	protected $insertFields = 'img,title,link,sort_id,status';
	// 编辑数据
	protected $updateFields = 'img,title,link,sort_id,status,id';

    //验证规则    
    protected $_validate = array(
        array('title','require','标题不能为空',1),
        array('link','require','链接不能为空',1),
        array('sort_id','require','排序不能为空',1),
        array('status','require','状态不能为空',1),    );


	public function getAll(){
        return $this->order('sort_id asc')->select();
	}

    //插入之前
    public function _before_insert(&$data, $option){

        if( $_FILES['img']['error'] ==0 ){
            $data['img']=upload();
        }else{
            $this->error="你还没有选择图片";
        }
        
    }


    /**
     * [_after_insert 插入之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_insert($data, $option){      
        logs('添加 id 为 '.$data['id'].' [ 轮播图片 ] ');
    }

    /**
     * [_after_update 更新之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_update($data, $option){        
        logs('修改 id 为 '.$option['where']['id'].' [ 轮播图片 ] ');

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
        logs('删除 id 为 '.$option['where']['id'].' [ 轮播图片 ] ');

    }



}