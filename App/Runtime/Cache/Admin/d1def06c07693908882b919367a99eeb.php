<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>简介</title>
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/bootstrap.min.css">
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

	<!-- <div class="exec">首页 > 简介</div> -->

	<table class="table table-striped table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="2">系统资料</td>
		</tr>
		<tr>
			<td>主机</td> 
			<td><?php echo $_SERVER['HTTP_HOST'];?></td>
		</tr>
		<tr>
			<td>操作系统</td> 
			<td><?php echo PHP_OS;?></td>
		</tr>
		<tr>
			<td>PHP版本</td> 
			<td><?php echo PHP_VERSION;?></td>
		</tr>
		<tr>
			<td>mysql版本</td> 
			<td><?php echo mysql_get_server_info() ;?></td>
		</tr>
		<tr>
			<td>服务器环境</td> 
			<td><?php echo $_SERVER ['SERVER_SOFTWARE'];?></td>
		</tr>
		<tr>
			<td>端口</td> 
			<td><?php echo $_SERVER['SERVER_PORT'];?></td>
		</tr>
		<tr>
			<td>ZEND版本</td> 
			<td><?php echo zend_version();?></td>
		</tr>
		<tr>
			<td>上传限制</td> 
			<td><?php echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件" ;?></td>
		</tr>
		<tr>
			<td>内存限制</td> 
			<td><?php echo get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无" ;?></td>
		</tr>
		<tr>
			<td>TP版本</td> 
			<td><?php echo THINK_VERSION;?></td>
		</tr>	
		<tr>
			<td>调试模式</td> 
			<td><?php echo APP_DEBUG?'已经开启':'没有开启';?></td>
		</tr>
		<tr>
			<td>缓存目录</td> 
			<td><?php echo CACHE_PATH;?></td>
		</tr>
		<tr class="info" style="text-align:center;">
			<td colspan="2">系统研发</td>
		</tr>
		<tr>
			<td>当前版本</td> 
			<td>1.0</td>
		</tr>
		<tr>
			<td>程序制作</td> 
			<td>bool</td>
		</tr>	
		<tr>
			<td>发布时间</td> 
			<td>2016-10-30</td>
		</tr>		
	</table>	

</div>


</body>
</html>