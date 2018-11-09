<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/system.css" />
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

	<table class="table table-hover table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="7">
			轮播列表
			<span style="float:right;"> [ <a href="/a/house/admin.php/Slider/add">添加</a> ] </span>
			</td>
		</tr>
		<tr class="warning">
			<td>ID</td> 
			<td>标题</td>
			<td>图片</td>
			<td>链接</td>
			<td>是否显示</td>
			<td>排序</td>
			<td width="80px">操作</td>
		</tr>	

<!-- 遍历 -->
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["id"]); ?></td> 
			<td><?php echo ($vo["title"]); ?></td>
			<td><img src="/a/house/Public/<?php echo ($vo["img"]); ?>" alt="" height="25"></td>
			<td><?php echo ($vo["link"]); ?></td>
			<td><?php echo ($vo["status"]); ?></td>
			<td><?php echo ($vo["sort_id"]); ?></td>
			<td class="operation">
				<a href="/a/house/admin.php/Slider/edit/id/<?php echo ($vo["id"]); ?>">
					<img src="/a/house/Public/Admin/images/icon_edit.gif" alt="编辑">
				</a>
				<a href="/a/house/admin.php/Slider/del/id/<?php echo ($vo["id"]); ?>" onclick="javascript:return confirm('你真的要删除吗？') ">
					<img src="/a/house/Public/Admin/images/icon_drop.gif" alt="删除">
				</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- end -->

	</table>	

</div>


</body>
</html>