<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>注册</title>
		<link href="/house/Public/Home/css/mui.min.css" rel="stylesheet" />
		<link href="/house/Public/Home/css/style.css" rel="stylesheet" />
		<style>
			.area {
				margin: 20px auto 0px auto;
			}
			.mui-input-group:first-child {
				margin-top: 20px;
			}
			.mui-input-group label {
				width: 22%;
			}
			.mui-input-row label~input,
			.mui-input-row label~select,
			.mui-input-row label~textarea {
				width: 78%;
			}
			.mui-checkbox input[type=checkbox],
			.mui-radio input[type=radio] {
				top: 6px;
			}
			.mui-content-padded {
				margin-top: 25px;
			}
			.mui-btn {
				padding: 10px;
			}
			
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">注册</h1>
		</header>
		<div class="mui-content">
			<form class="mui-input-group" action="/house/index.php/Login/register" method="post" id="form">
				<div class="mui-input-row">
					<label>账号</label>
					<input id='username' type="text" name="username" class="mui-input-clear mui-input" placeholder="请输入账号">
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input id='password' type="password" name="password" class="mui-input-clear mui-input" placeholder="请输入密码">
				</div>
				<div class="mui-input-row">
					<label>确认</label>
					<input id='password_confirm' type="password" name="password_confirm" class="mui-input-clear mui-input" placeholder="请确认密码">
				</div>
				<div class="mui-input-row">
					<label>邮箱</label>
					<input id='email' type="email" name="email" class="mui-input-clear mui-input" placeholder="请输入邮箱">
				</div>
				<div class="mui-input-row">
					<label>手机</label>
					<input id='phone' type="number" name="phone" class="mui-input-clear mui-input" placeholder="请输入手机">
				</div>
			</form>
			<div class="mui-content-padded">
				<button id='reg' class="mui-btn mui-btn-block mui-btn-primary" onclick="submit('/house/index.php/Login/register')">注册</button>
			</div>
			<div class="mui-content-padded">
				<p>注册真实可用，注册成功后的用户可用于登录，但是示例程序并未和服务端交互，用户相关数据仅存储于本地。</p>
			</div>
		</div>

		<script src="/house/Public/Home/js/jquery.min.js"></script>
		<script src="/house/Public/Home/js/mui.min.js"></script>
		<script>
			function submit(url){
				$.post(url, $("#form").serializeArray(),
				    function(data){
				      // console.log(data);
				      if( data.status==0 ){
				      	mui.toast(data.message);
				      }else{
				      	mui.toast(data.message);
				      	setTimeout(function(){
				      		window.location="/house/index.php/Login/index";
				      	},2000);
				      }
				      
				    }
				);				
			}
			 
		</script>
	</body>

</html>