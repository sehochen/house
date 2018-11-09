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

<form action="/a/house/admin.php/Email/index" method="post" enctype="multipart/form-data">
	<table class="table table-hover table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="3">邮箱设置</td>
		</tr>

		<tr>
			<td>smtp服务器</td> 
			<td>
				<input type="text" name="smtp" value="<?php echo ($info["smtp"]); ?>">
			</td>
		</tr>

		<tr>
			<td width="15%">启用smtp认证</td> 
			<td>
				启用<input type="radio" name="smtpAuth" value="1" <?php echo $info['smtpAuth']==1?'checked':null ;?>>
				关闭<input type="radio" name="smtpAuth" value="0" <?php echo $info['smtpAuth']==0?'checked':null ;?>>
			</td>
		</tr>
		<tr>
			<td>邮箱名</td> 
			<td colspan="2"><input type="text" name="username" value="<?php echo ($info["username"]); ?>"></td>
		</tr>
		<tr>
			<td>发件人地址</td> 
			<td colspan="2"><input type="text" name="from" value="<?php echo ($info["from"]); ?>"></td>
		</tr>
		<tr>
			<td>发件人姓名</td> 
			<td colspan="2"><input type="text" name="fromName" value="<?php echo ($info["fromName"]); ?>"></td>
		</tr>
		<tr>
			<td>授权邮箱密码</td> 
			<td colspan="2"><input type="text" name="password" value="<?php echo ($info["password"]); ?>"></td>
		</tr>
		<tr>
			<td>邮件编码</td> 
			<td colspan="2"><input type="text" name="charSet" value="<?php echo ($info["charSet"]); ?>"></td>
		</tr>
		<tr>
			<td>是否HTML格式</td> 
			<td colspan="2">
				是<input type="radio" name="isHtml" value="1" <?php echo $info['isHtml']==1?'checked':null ;?>>
				否<input type="radio" name="isHtml" value="0" <?php echo $info['isHtml']==0?'checked':null ;?>>

			</td>
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