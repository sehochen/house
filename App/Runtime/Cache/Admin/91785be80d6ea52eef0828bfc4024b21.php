<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加节点</title>
	<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/system.css" />
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

<form action="/house/admin.php/Node/add" method="post">
	<table class="table table-hover table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="2">
			添加节点
			<span style="float:right;"> [ <a href="/house/admin.php/Node/index">列表</a> ] </span>
			</td>
		</tr>
		<tr>
			<td  width="80px">节点名：</td>
			<td><input type="text" name="name"> </td>
		</tr>
		<tr>
			<td>父级：</td>
			<td>
				<select name="pid">
					<option value="0">顶级</option>

					<!-- 遍历 -->
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"> <?php echo str_repeat("——",$vo['level']);?> <?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- end -->

				</select>
			</td>
		</tr>		
		<tr>
			<td>控制器：</td>
			<td><input type="text" name="controller"> </td>
		</tr>
		<tr>
			<td>方法：</td>
			<td><input type="text" name="action"> </td>
		</tr>

		<tr style="text-align:center;">
			<td colspan="2">
				<input class="execbtn" type="submit" value="确定" />
				<input class="execbtn" type="reset" value="重置" />
			</td>
		</tr>		
	</table>

</form>
</div>


</body>
</html>