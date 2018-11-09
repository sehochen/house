<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
	<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/system.css" />
	<script src="/house/Public/Admin/js/jquery.min.js" type="text/javascript"></script>
	<script src="/house/Public/Admin/js/checkbox.js" type="text/javascript"></script>
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

<form action="/house/admin.php/Role/edit/id/8" method="post">
	<table class="table table-hover table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="2">
			分配权限 —— <?php echo ($info["name"]); ?>
			<span style="float:right;"> [ <a href="/house/admin.php/Role/index">列表</a> ] </span>
			</td>
		</tr>
		<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
		<tr style="text-align:center;">
				<td colspan="2">角色名：<input type="text" name="name" value="<?php echo ($info["name"]); ?>"> </td>
		</tr>
		<tr style="text-align:center;">
				<td colspan="2">角色描述：<textarea name="remark"><?php echo ($info["remark"]); ?></textarea></td>
		</tr>	

		<?php $node_ids=explode(",",$info['node_ids']); ?>

	<!-- 遍历 -->
	<?php if(is_array($menuA)): $i = 0; $__LIST__ = $menuA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td>
				<?php echo ($vo["name"]); ?>		
				<input type="checkbox" name="node_ids[]" value="<?php echo ($vo["id"]); ?>"
<?php if( in_array($vo['id'],$node_ids) ){ echo 'checked="checked"';}; ?>
				>

				<img alt="" class="selectall chk" id="chk_<?php echo ($vo["id"]); ?>"  
<?php if( in_array($vo['id'],$node_ids) ){ echo ' src="/house/Public/Admin/images/index/ck_down.gif" '; }else{ echo ' src="/house/Public/Admin/images/index/ck_up.gif" '; }; ?>
				/>
			</td> 
			<td>
				<div class="chk_<?php echo ($vo["id"]); ?>" id="list">
					
					<!-- 遍历 -->
					<?php if(is_array($menuB)): $i = 0; $__LIST__ = $menuB;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($val['pid'] == $vo['id'] ): echo ($val["name"]); ?><input type="checkbox" name="node_ids[]" value="<?php echo ($val["id"]); ?>"
<?php if( in_array($val['id'],$node_ids) ){ echo 'checked="checked"';}; ?>
								>
								<img alt="" class="chk" 
<?php if( in_array($val['id'],$node_ids) ){ echo ' src="/house/Public/Admin/images/index/ck_down.gif" '; }else{ echo ' src="/house/Public/Admin/images/index/ck_up.gif" '; }; ?>
								/>
								 &nbsp; &nbsp;					

						<?php else: endif; endforeach; endif; else: echo "" ;endif; ?>	
					<!-- end -->

				</div>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>

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
<script>
	var path="/house/Public/Admin/";
</script>