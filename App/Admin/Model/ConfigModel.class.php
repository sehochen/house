<?php
namespace Admin\Model;
use Think\Model;
/**
 * 系统设置模型 
 */
class ConfigModel extends Model {

    // 编辑数据
	protected $updateFields = 'title,logo,desc,keyword,copy,id,statistics';

    //更新之前
    public function _before_update(&$data, $option){

        if( $_FILES['img']['error'] ==0 ){
            $res=$this->field('logo')->find( $option['where']['id'] );
            $path=C('UPLOAD')['rootPath'].$res['logo'];            
            if( !unlink($path) ){
                $this->error="删除失败!";
            }
            $data['logo']=upload();
        }
        
    }


    /**
     * [_after_update 更新之后]
     * @param  [type] $data   [description]
     * @param  [type] $option [description]
     * @return [type]         [description]
     */
    public function _after_update($data, $option){        
        logs('修改 [ 网站设置 ] ');
    }





}