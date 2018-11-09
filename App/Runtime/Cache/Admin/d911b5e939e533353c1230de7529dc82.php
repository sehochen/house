<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/bootstrap.min.css">
<style>
.execbtn{height:25px;color:#fff;line-height:21px;padding:2px 10px;background:#a5cd52;-webkit-border-radius: 2px;border-radius:2px;border-left:0px;border-top:0px;border-right:0px; border-bottom:1px;margin:0px 10px;cursor:pointer;}
.execbtn:hover{background:#c1dd88;}	
</style>	
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">


	<table class="table table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td>SQL终端</td>
		</tr>
	<form action="/a/house/admin.php/Database/sql" method="post">
		<tr style="text-align:center;">
			<td>
				<textarea name="sql" cols="150" rows="8"><?php echo ($sql); ?></textarea>
			</td>
		</tr>
		<tr>
			<td> <input class="execbtn" type="submit" value=" 执 行 " />	</td>		
		</tr>
	</form>
		<tr>
			<td>
				
<pre>查询结果：
<table class="table">
	<tr class="warning">
						<?php if(is_array($keys)): $i = 0; $__LIST__ = $keys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><?php echo ($vo); ?></td><?php endforeach; endif; else: echo "" ;endif; ?> 
	</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<?php if(is_array($keys)): $i = 0; $__LIST__ = $keys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><td><?php echo ($vo[$vv]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?> 
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</pre>
			</td>
		</tr>	
	</table>	

</div>


</body>
</html>