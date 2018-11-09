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

<form action="/a/house/admin.php/Config/index" method="post" enctype="multipart/form-data">
	<table class="table table-hover table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="3">系统设置</td>
		</tr>
		<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
		<tr>
			<td>网站Logo</td> 
			<td>
				<input type="file" name="img"> /a/house/Public/<?php echo ($info["logo"]); ?>
			</td>
			<td rowspan="3" width="120px" style="text-align:center;">
				<a href="">
					<img src="/a/house/Public/<?php echo ($info["logo"]); ?>" alt="" class="img-thumbnail">
				</a>
				<span>Logo</span>
			</td>
		</tr>

		<tr>
			<td width="10%">网站标题</td> 
			<td><input type="text" name="" value="<?php echo ($info["title"]); ?>"></td>
		</tr>
		<tr>
			<td>网站描述</td> 
			<td><textarea name="desc" cols="60" rows="4"><?php echo ($info["desc"]); ?></textarea> </td>
		</tr>	
		<tr>
			<td>网站关键字</td> 
			<td colspan="2"><textarea name="keyword" cols="60" rows="4"><?php echo ($info["keyword"]); ?></textarea> </td>
		</tr>
		<tr>
			<td>备案</td> 
			<td colspan="2"><input type="text" name="copy" value="<?php echo ($info["copy"]); ?>"></td>
		</tr>
		<tr>
			<td>统计</td> 
			<td colspan="2"><textarea name="statistics" cols="60" rows="4"><?php echo ($info["statistics"]); ?></textarea></td>
		</tr>
		<tr style="text-align:center;">
			<td colspan="3">
				<input class="execbtn" type="submit" value="确定" />
				<input class="execbtn" type="button" value="重置" />
			</td>
		</tr>
	</table>	
</form>
</div>


</body>
</html>