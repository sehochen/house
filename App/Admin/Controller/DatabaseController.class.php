<?php
namespace Admin\Controller;
use Think\Controller;

class DatabaseController extends PublicController {

    public function index(){

        $sql="select table_name,engine,table_rows,data_length,index_length,create_time,table_collation,table_comment,data_free from tables where table_schema='".C('DB_NAME')."' order by table_rows desc";
        $table=M()->db(2,C('DB_CONFIG2') )->query($sql);

        $this->assign('table',$table)->display();
    }


    //备份
    public function backup(){
        
        if(IS_POST){
            $rootpath=str_replace('\\','/',dirname(THINK_PATH));
            $filename=$rootpath.C('SQL_PATH').I('post.file_name/s').'.sql';

            backup_mysql($filename,I('post.table') ) && $this->success('备份成功',U('Database/index') );

            die( logs('备份数据表 [ '.implode(',', I('post.table')).' ] 成功') );
        }

    }


    //恢复页面
    public function recovery(){
            $rootpath=str_replace('\\','/',dirname(THINK_PATH));
            $path=$rootpath.C('SQL_PATH');
            $dir=readDirectory($path);
            krsort($dir['file']);   //对数组排序
            $this->assign(array(
                'path'  =>  $path,
                'list'  =>  $dir['file'],  
            ));
        $this->display();
    }

    //下载
    public function downfile(){
        $rootpath=str_replace('\\','/',dirname(THINK_PATH));
        $path=$rootpath.C('SQL_PATH');
        $file=I('get.file/s');
        downFile($path.$file);
        die( logs('下载备份文件 [ '.$file.' ] 成功') );
    }

    //恢复
    public function back(){
        $rootpath=str_replace('\\','/',dirname(THINK_PATH));
        $path=$rootpath.C('SQL_PATH');
        $file=I('get.file/s');
        source_mysql($path.$file) ;
        $this->success('恢复成功',U('Database/recovery') ) ;
        die( logs('恢复备份文件 [ '.$file.' ] 成功') );
    }



    /**
    *删除
     */
    public function delete(){
        $rootpath=str_replace('\\','/',dirname(THINK_PATH));
        $path=$rootpath.C('SQL_PATH');
        $file=I('get.file/s');
        
        if ( unlink($path.$file)  ){
            $this->success('删除成功',U('Database/recovery') ) ;
            die( logs('删除备份文件 [ '.$file.' ] 成功') );
        }else{
            $this->error('删除失败');
        }
       
    }


    //执行sql
    public function sql(){
        if(IS_POST){
            $res=M()->query( I('post.sql') );

        }
        $this->assign(array(
            'keys'  =>  array_keys($res[0]),
            'list'  =>  $res,
            'sql'   =>  I('post.sql'),
        ))->display();
    }




}