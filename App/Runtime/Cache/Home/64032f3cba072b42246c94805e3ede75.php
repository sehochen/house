<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link href="/house/Public/Home/css/mui.min.css" rel="stylesheet" />
		<link href="/house/Public/Home/css/app.css"  rel="stylesheet"/>

		<style>
			ul {
				font-size: 14px;
				color: #8f8f94;
			}
			.mui-row li{
				list-style:none;
			}
			.head{
				border-radius:5em;				
			}
			.head-name{
				color:black;
			}
			.comm_list .mui-badge{
				border:1px solid rgba(0,0,0,.15);
				margin-bottom:0.5em;
				padding:0.5em;
			}
		</style>
	</head>

	<body>

<header id="header" class="mui-bar mui-bar-nav">
			<h1 class="mui-title"> 个人信息 </h1>
			<a class="mui-action-back mui-icon mui-icon-gear mui-pull-right"></a>
</header>


<!-- 内容 -->
<div class="mui-content">

	<!-- 预约看房时间 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
			    <center>
			    	<img class="head" src="/house/Public/<?php echo ($info["head"]); ?>" width="30%"> <br>
			    	<strong class="head-name"> <span><?php echo ($info["nickname"]); ?></span> </strong> <br>
			    	<span>[ 未实名认证 ]</span> <br>

			    	<span class="mui-badge"><?php echo ($info['sex']==1?'男':'女'); ?></span>
			    	<span class="mui-badge"><?php echo ($info["age"]); ?></span> <br>
			    	<span> <?php echo ($info["area"]); ?> </span> <br>
			    </center>
			   	    	
		    </li>
		    <li class="mui-table-view-cell">
		    	<span class="mui-col-sm-3 mui-col-xs-3">个人签名：</span>
		    	<p style="color:black;float:right;" class="mui-col-sm-9 mui-col-xs-9">
		    		<?php echo ($info["desc"]); ?>
		    	</p>
		    </li> 
		</ul>

	</div>


	<!-- 评价 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    <span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">个人信息</span>
				<div class="mui-col-sm-4 mui-col-xs-4">
		            <li class="mui-table-view-cell" style="border-top:none;">
		                <a class="mui-navigate-right mui-icon mui-icon-person" style="font-size:16px;" href="/house/index.php/User/info">
		                    个人资料
		                </a>
		            </li>				
		            <li class="mui-table-view-cell" style="border-top:none;">
		                <a class="mui-navigate-right mui-icon mui-icon-home" style="font-size:16px;" href="/house/index.php/Appointment">
		                    我的预约 
		                </a>
		            </li>
		            <li class="mui-table-view-cell" style="border-top:none;">
		                <a class="mui-navigate-right mui-icon mui-icon-star" style="font-size:16px;" href="/house/index.php/Collect">
		                    我的收藏
		                </a>
		            </li>
		            <li class="mui-table-view-cell" style="border-top:none;">
		                <a class="mui-navigate-right mui-icon mui-icon-compose" style="font-size:16px;" href="/house/index.php/House">
		                    我的发布
		                </a>
		            </li>
		            <li class="mui-table-view-cell" style="border-top:none;">
		                <a class="mui-navigate-right mui-icon mui-icon-chatboxes" style="font-size:16px;">
		                    我的消息
		                </a>
		            </li>
<!-- 		            <li class="mui-table-view-cell" style="border-top:none;">
		                <a class="mui-navigate-right mui-icon mui-icon-home" style="font-size:16px;">
		                    客户预约
		                </a>
		            </li> -->
		            <li class="mui-table-view-cell" style="border-top:none;">
		                <a class="mui-navigate-right mui-icon mui-icon-locked" style="font-size:16px;" href="/house/index.php/Login/loginOut">
		                    注销登录
		                </a>
		            </li>		            			            
		        </div>

		    </li>
		</ul>

	</div>
	



</div>
<!-- 内容end -->


<br>
<br>

<?php echo W('Menu/footer');?> 

</body>
</html>

<script>
	$(function(){
		$('.mui-tab-item').removeClass('mui-active');
    	$('.person').addClass('mui-active');
	} );
</script>