<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<title>布尔后台系统</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="keywords" content="食堂系统">
<meta name="discription" content="食堂系统">
<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/common.css" />
<link rel="stylesheet" type="text/css" href="/a/house/Public/Admin/css/system.css" />
<script src="/a/house/Public/Admin/js/jquery.min.js" type="text/javascript"></script>
<script src="/a/house/Public/Admin/js/menu.js" type="text/javascript"></script>

</head>
<body id="sysmain">
	<div class="content">

		<div class="syshead">

			<div class="clearfix">
				<p class="left">
					<img alt="布尔后台管理系统" title="布尔后台管理系统" src="/a/house/Public/Admin/images/logo/syslogo.png" height="40" width="263">
				</p>
				<p class="right">
					<span>管理员</span>
					<a href="javascript:void(0);"><?php echo session('name');?></a>
					<a class="outsys" title="退出系统" href="/a/house/admin.php/Login/LoginOut" onclick="javascript:return confirm('你真的要退出吗？')">
						<img src="/a/house/Public/Admin/images/index/outsys.gif" width="16" height="16" alt="" />退出
					</a>
				</p>
			</div>
		</div>


		<div class="sysmain clearfix">
			
			<!-- 主菜单 -->
			<div class="sysmenua">
				<ul>
<!-- 默认 -->
<li>
	<a class="current" href="javascript:void(0);" id="menu_1">后台首页</a>
</li>

					<!-- start 通过遍历获取顶级菜单 -->
					<?php if(is_array($menuA)): $k = 0; $__LIST__ = $menuA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li>
							<a href="javascript:void(0);" id="menu_<?php echo ($vo["id"]); ?>">
								<?php echo ($vo["name"]); ?>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- end -->
				</ul>
			</div>

<!-- 默认 -->
<div class="sysmenub" id="tab_menu_1">

		<p class="smenubtit">简介</p>
		<ul>
			<li>
				<a class="current" href="/a/house/admin.php/Index/intro" target="main">简介</a>
			</li>
			<li>
				<a href="/a/house/admin.php/Index/help" target="main">帮助</a>
			</li>
		</ul>
</div>



			<!-- 子级菜单 -->
			<?php if(is_array($menuB)): $i = 0; $__LIST__ = $menuB;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="sysmenub" id="tab_menu_<?php echo ($vo["pid"]); ?>" style="display:none;"}>

					<p class="smenubtit"><?php echo ($vo["name"]); ?></p>
					<ul>
						<?php if(is_array($menuB)): $k = 0; $__LIST__ = $menuB;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($val['pid'] == $vo['pid'] ): ?><li>
									<a <?php echo ($k==1 ?' class="current" ':null); ?> href="/a/house/admin.php/<?php echo ($val["controller"]); ?>/<?php echo ($val["action"]); ?>" target="main">
										<?php echo ($val["name"]); ?>
									</a>
								</li>
							<?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>


		<!--  引入外部文件   -->
		<div class="sysinfo" id="main" style="float:left;">
			<p class="sinfotit">简介</p>

			<div class="by" id="dg" class="sysinfo">
				<iframe src ="/a/house/admin.php/Index/intro" name="main" width="99%" height="460" scrolling="yes" frameborder="0" align="middle" marginheight="0" marginwidth="0" >
					<p>Your browser does not support iframes.</p>
				</iframe>
			</div>
		</div>






		</div>

	</div>

</body>
</html>