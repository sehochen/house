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
				<span style="float:right;"> [ <a href="/house/admin.php/Database/index">备份</a> ] </span>
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

	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo); ?></td>
			<td><?php echo filesize($path.$vo) ;?>B</td>
			<td><?php echo is_readable($path.'/'.$vo) ?'√':'×';?></td>
			<td><?php echo is_writeable($path.'/'.$vo) ?'√':'×';?></td>
			<td><?php echo date('Y-m-d H:i:s',filectime($path.'/'.$vo) );?></td>
			<td>
				<a href="/house/admin.php/Database/back/file/<?php echo ($vo); ?>">导入</a>
				<a href="/house/admin.php/Database/downfile/file/<?php echo ($vo); ?>">下载</a>
				<a href="/house/admin.php/Database/delete/file/<?php echo ($vo); ?>" onclick="javascript:return confirm('你真的要删除吗？') ">删除</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>

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