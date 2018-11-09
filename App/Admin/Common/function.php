<?php

//日志
function logs($desc){
	$data=array(
		'uid'	=>	session('uid'),
		'name'	=>	session('name'),
		'desc'	=>	$desc,	
		'time'	=>	time(),
	);
	D('Log')->add($data);
}


//写出php
function write_config($data,$path='./Config/email.php'){
    return file_put_contents($path,'<?php return '.var_export($data,true).';' );
}


//备份数据库
function backup_mysql($filename,$tables){
    include './Plugs/database/backup.php';
    return backup( $filename,$tables );
}


//恢复数据库
function source_mysql($filename){
    include './Plugs/database/source.php';
    $db=New mysqli_db(C('DB_HOST'),C('DB_USER'),C('DB_PWD'),C('DB_NAME'),C('DB_CHARSET'));
    return $db->backup($filename);
}

//打开指定目录
/**
 * 遍历目录函数，只读取目录中的最外层的内容
 * @param string $path
 * @return array
 */
function readDirectory($path) {
    $handle = opendir ( $path );
    while ( ($item = readdir ( $handle )) !== false ) {
        //.和..这2个特殊目录
        if ($item != "." && $item != "..") {
            if (is_file ( $path . "/" . $item )) {
                $arr ['file'] [] = $item;
            }
            if (is_dir ( $path . "/" . $item )) {
                $arr ['dir'] [] = $item;
            }
        
        }
    }
    closedir ( $handle );
    return $arr;
}


//下载
function downFile($filename){
    header("content-disposition:attachment;filename=".basename($filename));
    header("content-length:".filesize($filename));
    readfile($filename);
}






?>