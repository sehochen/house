<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/bootstrap.min.css">
	<script src="/a/house/Public/Admin/js/jquery.min.js" type="text/javascript"></script>
<style>
.execbtn{height:25px;color:#fff;line-height:21px;padding:2px 10px;background:#a5cd52;-webkit-border-radius: 2px;border-radius:2px;border-left:0px;border-top:0px;border-right:0px; border-bottom:1px;margin:0px 10px;cursor:pointer;}
.execbtn:hover{background:#c1dd88;}	
</style>
</head>
<body>	
<div class="sysinfo" style="margin-left:5px;">

<form action="/a/house/admin.php/Database/backup" method="post">
	<table class="table table-bordered table-condensed table-responsive" >
		<tr class="info" style="text-align:center;">
			<td colspan="9">
				数据库备份
				<span style="float:right;"> [ <a href="/a/house/admin.php/Database/recovery">恢复</a> ] </span>
			</td>
		</tr>
		<tr class="warning">
			<td>
				<input type="checkbox" name="table" id="chkall" onclick='selectcheckbox(this.form)'>	
			</td> 
			<td>表名</td>
			<td>类型</td>
			<td>记录数</td>
			<td>数据</td>
			<td>索引</td>
			<td>编码</td>
			<td>注释</td>
			<td>创建时间</td>
		</tr>

<?php if(is_array($table)): $i = 0; $__LIST__ = $table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td>
				<input type="checkbox" name="table[]" class="chk" value="<?php echo ($vo["table_name"]); ?>">
			</td>
			<td><?php echo ($vo["table_name"]); ?></td>
			<td><?php echo ($vo["engine"]); ?></td>
			<td><?php echo ($vo["table_rows"]); ?></td>
			<td><?php echo ($vo["data_length"]); ?></td>
			<td><?php echo ($vo["index_length"]); ?></td>
			<td><?php echo ($vo["table_collation"]); ?></td>
			<td><?php echo ($vo["table_comment"]); ?></td>
			<td><?php echo ($vo["create_time"]); ?></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>

		<tr>
			<td style="text-align:right;" colspan="9">共 <?php echo count($table);?> 张表</td>
		</tr>	
		<tr class="warning">
			<td style="text-align:center;" colspan="9">分卷备份设置</td>
		</tr>
		<tr>
			<td style="text-align:center;" colspan="9">备份名称：<input type="text" name="file_name" value="<?php echo date('Y_m_d_H_i_s');?>" >.sql </td>
		</tr>
		<tr>
			<td style="text-align:left;" colspan="9">
				<input class="execbtn" type="submit" value="确定" onclick="javascript:return confirm('你真的要备份吗？') "/>
			</td>
		</tr>
	</table>	
</form>
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