<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<title>食堂系统</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="keywords" content="食堂系统">
<meta name="discription" content="食堂系统">
<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/common.css" />
<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/system.css" />
</head>
<body id="loginpage">
	<div id="login" class="clearfix">
		<div class="main clearfix">
			<div class="logbox">
				<div class="header">
					<img alt="臻尚餐饮管理有限公司" title="臻尚餐饮管理有限公司" src="images/logo/syslogo.png" height="40" width="263">
				</div>
				<div class="web_login" id="web_login">
					<form id="loginform"  name="loginform" action="javascript:alert(0);" method="post" target="_self">
						<div class="inputOuter">
                            <input type="text" class="inputstyle" id="u" name="u" value="" tabindex="1">
                        </div>
						<div class="inputOuter">
                            <input type="password" class="inputstyle password" id="p" name="p" value="" maxlength="16" tabindex="2"> 
                        </div>
                        <div class="submit">
	                        <a class="login_button" href="javascript:void(0);">
	                            <input type="submit" tabindex="6" value="登 录" class="btn" id="login_button">
	                        </a>
                        </div>
					</form>
				</div>
				<div class="footer">
					<a href="javascript:void(0);" target="_blank" >忘了密码？</a>
					<a href="javascript:void(0);" target="_blank" >内部注册</a>
					<a href="javascript:void(0);" target="_blank" >意见反馈</a>
				</div>
			</div>
			<!--<div class="leftshow">
				<p class="systit">食堂出入库管理</p>
			</div>
-->		</div>
	</div>
</body>
</html>