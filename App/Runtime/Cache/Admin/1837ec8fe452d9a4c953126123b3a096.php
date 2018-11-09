<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/bootstrap.min.css">
	<script src="/house/Public/Admin/js/jquery.min.js" type="text/javascript"></script>
<style>
.execbtn{height:25px;color:#fff;line-height:21px;padding:2px 10px;background:#a5cd52;-webkit-border-radius: 2px;border-radius:2px;border-left:0px;border-top:0px;border-right:0px; border-bottom:1px;margin:0px 10px;cursor:pointer;}
.execbtn:hover{background:#c1dd88;}	
</style>
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

<form action="" method="">
	<table class="table table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="9">
				数据库备份
				<span style="float:right;"> [ <a href="database.html">备份</a> ] </span>
			</td>
		</tr>
		<tr class="warning">
			<td>文件名</td>
			<td>文件大小</td>
			<td>可读</td>
			<td>可写</td>
			<td>备份时间</td>
			<td>操作</td>
		</tr>
		<tr>
			<td>bool.sql</td>
			<td>16k</td>
			<td>√</td>
			<td>√</td>
			<td>2016-10-29 13:54:37</td>
			<td>
				<a href="">导入</a>
				<a href="">下载</a>
				<a href="">删除</a>
			</td>
		</tr>
		<tr>
			<td style="text-align:right;" colspan="9">共 8 张表</td>
		</tr>	

	</table>	
</form>
</div>


</body>
</html>
<script>
	$(function(){
		$("#chkall").click(function(){
			var chk=$(".chk").attr("checked");
			// console.log( chk );
			if(chk){
				$(".chk").removeAttr("checked");
			}else{
				$(".chk").attr("checked","checked");
			}

			
		});
	});
</script>