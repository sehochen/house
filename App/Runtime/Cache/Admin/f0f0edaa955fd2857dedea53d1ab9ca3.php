<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<title>布尔后台系统</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="keywords" content="布尔后台系统">
<meta name="discription" content="布尔后台系统">
<link rel="stylesheet" type="text/css" href="/house/Public/Admin/css/login.css" />
<style>
	.verify{
		width:120px;
		cursor:pointer;
		float:right;
		position:absolute; 
		top:127px;
		right:75px;
	}
</style>
</head>
<body id="loginpage">
	<div id="login" class="clearfix">
		<div class="main clearfix">
			<div class="logbox">
				<div class="header">
					<img alt="布尔后台系统" title="布尔后台系统" src="/house/Public/Admin/images/logo/syslogo.png" height="40" width="263">
				</div>
				<div class="web_login" id="web_login">
					<form id="loginform"  name="loginform" action="/house/admin.php/Login/login" method="post" target="_self">
						<div class="inputOuter">
                            <input type="text" class="inputstyle" id="u" name="username" value="" tabindex="1">
                        </div>
						<div class="inputOuter">
                            <input type="password" class="inputstyle password" id="p" name="password" value="" maxlength="16" tabindex="2"> 
                        </div>
                        <div class="inputOuter">
                            <input type="text" class="inputstyle"  tabindex="3" name="verify" id="verify"> 
                            <img src="/house/admin.php/Login/verify" alt="点击更换验证码" onclick="this.src='/house/admin.php/Login/verify/'+Math.random " class="verify">
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
			<div class="leftshow">
				<p class="systit">布尔后台管理系统</p>
			</div>
		</div>
	</div>
</body>
</html>
<script src="/house/Public/Admin/js/jquery.min.js"></script>