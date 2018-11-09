<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/bootstrap.min.css">
	<script src="/a/house/Public/Admin/js/jquery.min.js" type="text/javascript"></script>
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
.execbtn{height:25px;color:#fff;line-height:21px;padding:2px 10px;background:#a5cd52;-webkit-border-radius: 2px;border-radius:2px;border-left:0px;border-top:0px;border-right:0px; border-bottom:1px;margin:0px 10px;cursor:pointer;}
.execbtn:hover{background:#c1dd88;}	
	</style>
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

	<table class="table table-hover table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="7">管理员日志</td>
		</tr>
		<form action="/a/house/admin.php/Log/clear" method="POST">
			<tr>
				<td colspan="7">

					清除日志：
					<select name="time">
						<option value=""> 请选择 </option>
						<option value="1"> 一天之内 </option>
						<option value="3"> 三天之内 </option>
						<option value="7"> 一周之内 </option>
						<option value="30"> 一月之内 </option>
						<option value="365"> 一年之内 </option>
					</select>
					<input class="execbtn" name="btn1" type="submit" value="清除" onclick="javascript:return confirm('你真的要清除吗？') "/> 
				</td> 
			</tr>
		</form>

	<form action="/a/house/admin.php/Log/clears" method="post">

		<tr class="warning">
			<td> <input type="checkbox" id="chkall" onclick='selectcheckbox(this.form)'> </td>
			<td>编号</td> 
			<td>操作者</td>
			<td>操作记录</td>
			<td>操作时间</td>
		</tr>	

	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td> <input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" class="chk"> </td>
			<td><?php echo ($vo["id"]); ?></td> 
			<td><?php echo ($vo["name"]); ?></td>
			<td><?php echo ($vo["desc"]); ?></td>
			<td><?php echo date('Y-m-d H:i',$vo['time']);?></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>

		<tr class="warning">
			<td colspan="7" class="page">
				<input class="execbtn" type="submit" value="清除" style="float:left;" onclick="javascript:return confirm('你真的要清除吗？') "/> 
				<?php echo ($page); ?>
			</td> 
		</tr>

	</form>

	</table>	

</div>


</body>
</html>
<script>

/**
 +----------------------------------------------------------
 * 表单全选
 +----------------------------------------------------------
 */
function selectcheckbox(form) {
    for (var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if (e.name != 'chkall' && e.disabled != true) e.checked = form.chkall.checked;
    }
}


</script>