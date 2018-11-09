<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link href="/house/Public/Home/css/mui.min.css" rel="stylesheet" />
		<link href="/house/Public/Home/css/app.css"  rel="stylesheet"/>
		<link href="/house/Public/Home/css/mui.poppicker.css" rel="stylesheet" />
		<link href="/house/Public/Home/css/mui.picker.min.css" rel="stylesheet" />
		<style>
			ul {
				font-size: 14px;
				color: #8f8f94;
			}
			.mui-row li{
				list-style:none;
			}

			.price{
	/*			float:left;*/
				font-size:1em;
				margin-top:6%;
				color:#FF6600;
				font-weight:bold;
			}
			.info_list{
				float:right;
				border-left:1px solid rgba(143,143,148,0.3);
				padding:0 0.5em;
			} 
			.ico_list .mui-badge{
				/*clear:both;*/
				float:left;
				margin:0 0.5em;
			}
			.device span{
				margin:0 0.5em;
			}
		</style>
	</head>

	<body>

<header id="header" class="mui-bar mui-bar-nav">
			<a class="mui-icon mui-icon-left-nav mui-pull-left" href="/house/index.php/Index"></a>
			<h1 class="mui-title"> 
				<?php echo ($info["name"]); ?> 
			</h1>
		<a class="mui-icon mui-icon-star mui-pull-right" href="javascript:;" onclick="submit('/house/index.php/Collect/add')"></a>
</header>

<div class="mui-content">


	<!-- 轮播图片 -->
	<div id="slider" class="mui-slider" >
		<div class="mui-slider-group mui-slider-loop">

			<?php $img=explode(',',$info['img']); ?> 

			<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
			<div class="mui-slider-item mui-slider-item-duplicate">
				<a href="#">
					<img src="/house/Public/<?php echo ($img[0]); ?>">
				</a>
			</div>


				<?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-slider-item">
						<a href="#">
							<img src="/house/Public/<?php echo ($vo); ?>">
						</a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>


			<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
			<div class="mui-slider-item mui-slider-item-duplicate">
				<a href="#">
					<img src="/house/Public/<?php echo ($img[0]); ?>">
				</a>
			</div>
		</div>
		<div class="mui-slider-indicator">

<!-- slider  -->
<?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-indicator <?php echo ($i==1?'mui-active':null); ?>	"></div><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- end -->		

		</div>

	</div>


	<!-- 内容 -->
	<div class="mui-row" style="background-color:white;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<strong style="color:black;"><?php echo ($info["name"]); ?></strong>
		    </li>
		    <li class="mui-table-view-cell">
				<span class="price"> <?php echo ($info["money"]); ?>元/月 </span>
				
				<span class="info_list"><?php echo ($info["area"]); ?>m²</span>
				<span class="info_list"><?php echo ($info["direction"]); ?></span>
				<span class="info_list"><?php echo ($info["type"]); ?></span>
		    </li>
		    <li class="mui-table-view-cell">
			    <div class="ico_list">
							<span class="mui-badge mui-badge-success"><?php echo ($info["pay_ren"]); ?></span>
							<span class="mui-badge mui-badge-success"><?php echo ($info["type"]); ?></span>
							<span class="mui-badge mui-badge-success"><?php echo ($info["decoration"]); ?></span>	    	
			    </div>
		    </li>
		</ul>

	</div>	


	<!-- 房间信息 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">房间信息</span>
		    </li>
		    <li class="mui-table-view-cell">
				<div style="float:left;">
					<span>面积：</span> 
					<span style="color:black;"><?php echo ($info["area"]); ?>m²</span>
				</div>
				<div style="float:right;">
					<span>户型：</span>
					<span style="color:black;"><?php echo ($info["type"]); ?></span>
				</div>
		    </li>
		    <li class="mui-table-view-cell">
				<div style="float:left;">
					<span>楼层：</span> 
					<span style="color:black;"><?php echo ($info["floor"]); ?></span>
				</div>
				<div style="float:right;">
					<span>装修：</span>
					<span style="color:black;"><?php echo ($info["decoration"]); ?></span>
				</div>
		    </li>
<!-- 		    <li class="mui-table-view-cell">
					<span>编号：</span> 
					<span style="color:black;">NO.SH20161030</span>
		    </li>  -->
		    <li class="mui-table-view-cell">
					<span>发布时间：</span> 
					<span style="color:black;"><?php echo date('Y-m-d H:i:s',$info['add_time']);?></span>
		    </li>
		</ul>

	</div>

	<!-- 地图 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">位置信息</span>
		    </li>
		    <li class="mui-table-view-cell">
				<iframe src="http://api.map.baidu.com/geocoder?address=<?php echo trim($info['location'],'-'); echo ($info["street"]); ?>&output=html&src=yourCompanyName|yourAppName" frameborder="0" width="103%" height="250px">
					你的浏览器不支持iframe框架
				</iframe>
		    </li> 
		    <li class="mui-table-view-cell">
					<span>地址：</span> 
					<span style="color:black;"><?php echo ($info["location"]); ?></span>
		    </li> 
		    <li class="mui-table-view-cell">
					<span>街道：</span> 
					<span style="color:black;"><?php echo ($info["street"]); ?></span>
		    </li>		    
		    <li class="mui-table-view-cell">
					<span>公交：</span> 
					<span style="color:black;">快线1号 荣御花园</span>
		    </li>
		    <li class="mui-table-view-cell">
					<span>地铁：</span> 
					<span style="color:black;">1号线 星湖街 4km</span>
		    </li>
		</ul>

	</div>


	<!-- 设施 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">设施</span>
		    </li>
		    <li class="mui-table-view-cell device">
				<!-- <span> <?php echo explode(',',$info['facilities'])[0];?> 洗衣机 </span> -->
				<?php $facilities=explode(',',$info['facilities']); ?> 
				<?php if(is_array($facilities)): $i = 0; $__LIST__ = $facilities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span> <?php echo ($vo); ?> </span><?php endforeach; endif; else: echo "" ;endif; ?>

		    </li> 
		</ul>

	</div>



	<!-- 评论 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">房东</span>
		    </li>
		    <li class="mui-table-view-cell">
						
					<ul class="mui-table-view">
						<li class="mui-table-view-cell mui-media">
							<a href="/house/index.php/Comment/index/uid/<?php echo ($info["uid"]); ?>">
								<img class="mui-media-object mui-pull-left" src="/house/Public/<?php echo ($info["head"]); ?>">
								<div class="mui-media-body">
									<span style="color:black;"> 
										<strong><?php echo ($info["nickname"]); ?></strong>
									</span>
									<p class="mui-ellipsis"> 已有评价( <?php echo ($count); ?> )</p>
								</div>
							</a>
						</li>
						<li class="mui-table-view-cell mui-media">
							<a href="javascript:;">
								<div class="mui-media-body">
									<span>我希望租客 &nbsp;</span>
				<?php $demand=explode(',',$info['demand']); ?> 
				<?php if(is_array($demand)): $i = 0; $__LIST__ = $demand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class="mui-badge"><?php echo ($vo); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>									
								</div>
							</a>
						</li>
					</ul>
		    </li> 
		</ul>

	</div>

<br><br>

<!-- <a href="tel:18882323232">打电话</a>
<a href="sms:18882323232">发短信</a> -->

<nav class="mui-bar mui-bar-tab">
			<a class="mui-tab-item mui-active" href="/house/index.php/Appointment/add/hid/<?php echo ($info["id"]); ?>">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">预约</span>
			</a>
			<a class="mui-tab-item" href="sms:<?php echo ($info["phone"]); ?>">
				<span class="mui-icon mui-icon-email"></span>
				<span class="mui-tab-label">短信</span>
			</a>

			<a class="mui-tab-item" href="tel:<?php echo ($info["phone"]); ?>">
				<span class="mui-icon mui-icon-phone"></span>
				<span class="mui-tab-label">电话</span>
			</a>
<!-- 			<a class="mui-tab-item" href="#tabbar-with-map">
				<span class="mui-icon mui-icon-qq"></span>
				<span class="mui-tab-label">QQ</span>
			</a> -->
</nav>




</div>





			</div>
		</div>





</body>
</html>
<script src="/house/Public/Home/js/mui.min.js"></script>

<!-- <script src="/house/Public/Home/js/app.js"></script> -->
<script type="text/javascript" charset="utf-8">
	mui.init({
		swipeBack:true //启用右滑关闭功能
	});
	var slider = mui("#slider");
	slider.slider({
		interval: 3000
	});

</script>
<script>

    //点击li时，执行foo_1函数
    mui(".mui-bar").on("tap","a",foo_1);

    function foo_1(){
      // console.log("foo_1 execute");
      window.location=this.href;
    }

</script>

<script src="/house/Public/Home/js/jquery.min.js"></script>
<script>
	function submit(url){

		$.post(url, {"hid":<?= $info['id'] ?>},
		    function(data){
		      // console.log(data);
		      if( data.status==0 ){
		      	mui.toast(data.message);
		      }else{
		      	mui.toast(data.message);
		      	setTimeout(function(){
		      		window.location="/house/index.php/Collect/index ";
		      	},2000);
		      }
		      
		    }
		);

	}	
</script>