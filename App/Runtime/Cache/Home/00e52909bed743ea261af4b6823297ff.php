<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link href="/a/house/Public/Home/css/mui.min.css" rel="stylesheet" />
		<link href="/a/house/Public/Home/css/app.css"  rel="stylesheet"/>
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

		<header class="mui-bar mui-bar-nav" style="padding-right: 15px;">
			<a href="/a/house/index.php/Index/location" id='setting' class=" mui-pull-left mui-btn-link"><?php echo session('location') ?session('location'):'北京' ;?></a>
			<span class="mui-icon mui-icon-arrowdown" onclick="javascript:;window.location='/a/house/index.php/Index/location' "></span>

			<h1 class="mui-title">布尔租房</h1>
			<span class="mui-pull-right mui-icon mui-icon-search"></span>
		</header>

		<div class="mui-content">
			<div class="mui-content-padded">

		<div id="slider" class="mui-slider" >
			<div class="mui-slider-group mui-slider-loop">
				<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="<?php echo ($slider["0"]["link"]); ?>">
						<img src="/a/house/Public/<?php echo ($slider["0"]["img"]); ?>">
						<p class="mui-slider-title"><?php echo ($slider["0"]["title"]); ?></p>
					</a>
				</div>


			<!-- slider -->
			<?php if(is_array($slider)): $i = 0; $__LIST__ = $slider;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-slider-item">
					<a href="<?php echo ($vo["link"]); ?>">
						<img src="/a/house/Public/<?php echo ($vo["img"]); ?>">
						<p class="mui-slider-title"><?php echo ($vo["title"]); ?></p>
					</a>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<!-- end -->


				<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="<?php echo ($slider["0"]["link"]); ?>">
						<img src="/a/house/Public/<?php echo ($slider["0"]["img"]); ?>">
						<p class="mui-slider-title"><?php echo ($slider["0"]["title"]); ?></p>
					</a>
				</div>
			</div>

			<div class="mui-slider-indicator">

<!-- slider  -->
<?php if(is_array($slider)): $i = 0; $__LIST__ = $slider;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-indicator <?php echo ($i==1?'mui-active':null); ?>	"></div><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- end -->

			</div>
		</div>

<!-- 内容 -->
<div class="mui-content">

    <div class="mui-row" style="background-color:white;margin-bottom:0.2%;">
        <div class="mui-col-sm-4 mui-col-xs-4">
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="/a/house/index.php/House/lists">
                    整租
                </a>
            </li>
        </div>
        <div class="mui-col-sm-4 mui-col-xs-4">
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="/a/house/index.php/House/lists">
                    合租
                </a>
            </li>
        </div> 
        <div class="mui-col-sm-4 mui-col-xs-4">
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="/a/house/index.php/House/lists">
                    日租
                </a>
            </li>
        </div> 
        <div class="mui-col-sm-4 mui-col-xs-4">
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="/a/house/index.php/House/lists">
                    找房
                </a>
            </li>
        </div> 
        <div class="mui-col-sm-4 mui-col-xs-4">
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="/a/house/index.php/Message">
                    消息
                </a>
            </li>
        </div> 
        <div class="mui-col-sm-4 mui-col-xs-4">
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="/a/house/index.php/User">
                    我的
                </a>
            </li>
        </div> 
    </div>
	<!-- end -->


	<!-- row 筛选 -->
	<div class="mui-row" style="background-color:white;">      	
		<li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;"> 最新房源</span>
		</li>
	</div>
	<!-- end -->


	<!-- row 列表 -->
	<div class="mui-row">

			<ul class="mui-table-view">

			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
					<a href="/a/house/index.php/House/info/id/<?php echo ($vo["id"]); ?>" class="bool_list">
						<img class=" mui-pull-left" src="/a/house/Public/<?php echo explode(',',$vo['img'])[0];?>">
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


<script type="text/javascript" charset="utf-8">
	mui.init({
		swipeBack:true //启用右滑关闭功能
	});
	var slider = mui("#slider");
	slider.slider({
		interval: 2000
	});

</script>