<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/system.css" />
	<style>
		.page{
			text-align:right;
		}
		.page a{
			margin:0 10px;
		}
	</style>
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

<form action="/house/admin.php/Admin/add" method="post">
	<table class="table table-hover table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="3">
			管理员添加
			<span style="float:right;"> [ <a href="/house/admin.php/Admin/index">列表</a> ] </span>
			</td>
		</tr>	
		<tr>
			<td width="80px">账号</td> 
			<td><input type="text" value="" name="username"> </td>
			<td>* 此项为必填项</td>
		</tr>
		<tr>
			<td width="80px">密码</td> 
			<td><input type="password" value="" name="password"> </td>
			<td>* 此项为必填项</td>
		</tr>
		<tr>
			<td width="80px">密码</td> 
			<td><input type="password" value="" name="passwords"> </td>
			<td>* 两次输入必须一致</td>
		</tr>
		<tr>
			<td width="80px">角色</td> 
			<td>
				<select name="role_id" id="">
					<option value="">请选择</option>
					<?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</select>
				&nbsp;&nbsp;
				<span> [ <a href=""> 添加角色 </a> ] </span>
			</td>
			<td>* 此项为必选项</td>
		</tr>
		<tr>
			<td width="80px">邮箱</td> 
			<td><input type="text" value="" name="email"> </td>
			<td>* 此项可为空</td>
		</tr>
		<tr>
			<td width="80px">手机号</td> 
			<td><input type="text" value="" name="phone"> </td>
			<td>* 此项可为空</td>
		</tr>
		<tr>
			<td>备注</td> 
			<td> <textarea name="remark" cols="60" rows="4"></textarea> </td>
			<td>* 此项可为空</td>
		</tr>
		<tr style="text-align:center;">
			<td colspan="3">
				<input class="execbtn" type="submit" value="确定" />
				<input class="execbtn" type="reset" value="重置" />
			</td>
		</tr>		
	</table>

</form>
</div>


</body>
</html>