<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>角色列表</title>
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/system.css" />
	<style>
		.operation a{
			text-decoration:none;
			margin:0 5px;
		}
	</style>
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

	<table class="table table-hover table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="7">
			角色管理
			<span style="float:right;"> [ <a href="/a/house/admin.php/Role/add">添加角色</a> ] </span>
			</td>
		</tr>
		<tr class="warning">
			<td>编号</td> 
			<td>角色名</td>
			<td>权限</td>
			<td>角色描述</td>
			<td>注册时间</td>
			<td width="80px">操作</td>
		</tr>	

	<!-- 遍历 -->
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["id"]); ?></td> 
			<td><?php echo ($vo["name"]); ?></td>
			<td><?php echo ($vo["node_ids"]); ?></td>
			<td><?php echo ($vo["remark"]); ?></td>
			<td><?php echo date('Y-m-d H:i',$vo['add_time']);?></td>
			<td class="operation">
				<a href="/a/house/admin.php/Role/edit/id/<?php echo ($vo["id"]); ?>">
					<img src="/a/house/Public/Admin/images/icon_edit.gif" alt="编辑">
				</a>
				<a href="/a/house/admin.php/Role/del/id/<?php echo ($vo["id"]); ?>" onclick="javascript:return confirm('你真的要删除吗？') ">
					<img src="/a/house/Public/Admin/images/icon_drop.gif" alt="删除">
				</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<!-- end -->

	</table>	

</div>


</body>
</html>