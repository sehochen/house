<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员列表</title>
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/system.css" />
	<style>
		.page{
			text-align:right;
		}
		.page a{
			margin:0 10px;
		}
		.operation a{
			text-decoration:none;
			margin:0 8px;
		}
	</style>
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

	<table class="table table-hover table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="7">
			管理员列表
			<span style="float:right;"> [ <a href="/a/house/admin.php/Admin/add">添加</a> ] </span>
			</td>
		</tr>
		<tr class="warning">
			<td>ID</td> 
			<td>用户名</td>
			<td>角色</td>
			<td>邮箱</td>
			<td>手机号</td>
			<td>注册时间</td>
			<td width="80px">操作</td>
		</tr>	

	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["id"]); ?></td> 
			<td><?php echo ($vo["username"]); ?></td>
			<td><?php echo ($vo["role_id"]); ?></td>
			<td><?php echo ($vo["email"]); ?></td>
			<td><?php echo ($vo["phone"]); ?></td>
			<td><?php echo date('Y-m-d H:i',$vo['create_time']);?></td>
			<td class="operation">
				<a href="/a/house/admin.php/Admin/edit/id/<?php echo ($vo["id"]); ?>">
					<img src="/a/house/Public/Admin/images/icon_edit.gif" alt="编辑">
				</a>
				<?php if($vo['id']!=1): ?>
					<a href="/a/house/admin.php/Admin/del/id/<?php echo ($vo["id"]); ?>" onclick="javascript:return confirm('你真的要删除吗？') ">
						<img src="/a/house/Public/Admin/images/icon_drop.gif" alt="删除">
					</a>
				<?php endif;?>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>

		<tr class="warning">
			<td colspan="7" class="page">
				<?php echo ($page); ?>
			</td> 
		</tr>

	</table>	

</div>


</body>
</html>