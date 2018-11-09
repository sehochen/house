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
			.bool_list .mui-media-body p{
				font-size:8px;
				margin-top:2%;
			}
			.bool_list .mui-media-body strong{
				color:black;
			}
			.bool_list .mui-media-body .price{
				float:right;
				font-size:1em;
				margin-top:6%;
				color:#FF6600;
				font-weight:bold;
			}
			.bool_list img{
				margin-right:0.5em;
				width:40%;
			}
			.bool_list .mui-badge{
				margin-top:4%;
			} 
		</style>
	</head>

	<body>

<header id="header" class="mui-bar mui-bar-nav">
			<a class="mui-icon mui-icon-left-nav mui-pull-left" href="/house/index.php/User"></a>
			<h1 class="mui-title"> 
				我发布的房源 
			</h1>
		<a class="mui-icon mui-icon-plusempty mui-pull-right" href="/house/index.php/House/add"></a>
</header>

<!-- 内容 -->
<div class="mui-content">



	<!-- row 列表 -->
	<div class="mui-row">

			<ul class="mui-table-view">

			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
					<a href="/house/index.php/House/info/id/<?php echo ($vo["id"]); ?>" class="bool_list">
						<img class=" mui-pull-left" src="/house/Public/<?php echo explode(',',$vo['img'])[0];?>">
						<div class="mui-media-body">
							<strong> <?php echo ($vo["name"]); ?> </strong> 
							<span class="price"> <?php echo ($vo["money"]); ?>/月 </span> 
							<p> <?php echo ($vo["room_type"]); ?> <?php echo ($vo["area"]); ?>m² <?php echo ($vo["direction"]); ?></p>
							<p class='mui-ellipsis mui-icon mui-icon-location'><?php echo ($vo["location"]); ?></p>
							<br>
							<span class="mui-badge mui-badge-success"><?php echo ($vo["pay_ren"]); ?></span>
							<span class="mui-badge mui-badge-success"><?php echo ($vo["type"]); ?></span>
							<span class="mui-badge mui-badge-success"><?php echo ($vo["decoration"]); ?></span>
						</div>
					</a>
					<div style="margin-top:0.2em;">
					发布时间 <?php echo date('Y-m-d H:i:s',$vo['add_time']);?>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>


			</ul>		

	</div>
	<!-- end -->



<br><br>

<?php echo W('Menu/footer');?> 



</div>


	</body>

</html>

<script src="/house/Public/Home/js/mui.min.js"></script>
<script type="text/javascript" charset="utf-8">
	mui.init({
		swipeBack:true //启用右滑关闭功能
	});

</script>
<script>
    $(function () {
    	$('.mui-tab-item').removeClass('mui-active');
    	$('.person').addClass('mui-active');

    });
</script>