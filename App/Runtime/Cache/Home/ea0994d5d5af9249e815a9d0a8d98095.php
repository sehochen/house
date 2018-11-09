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
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title"> 
			<form action="/house/index.php/House/lists?location=&amp;money=&amp;order=&amp;rent=%E7%A7%9F%E4%BD%8F%E6%96%B9%E5%BC%8F+%E5%90%88%E7%A7%9F" method="get" id="nameForm">
				<input type="text" style="height:30px;border-radius:1em;" name="name" value="<?php echo I('get.name');?>"> 
				<!-- <br> -->
				<input type="submit" class="submit">
			</form>
			</h1>
		<span class="mui-icon mui-icon-search mui-pull-right" onclick="submit()"></span>
</header>

<!-- 内容 -->
<div class="mui-content">

<form action="/house/index.php/House/lists?location=&amp;money=&amp;order=&amp;rent=%E7%A7%9F%E4%BD%8F%E6%96%B9%E5%BC%8F+%E5%90%88%E7%A7%9F" method="get" id="form">

	<!-- row 筛选 -->
	<div class="mui-row" style="background-color:white;">	

        <div class="mui-col-sm-3 mui-col-xs-3">
            <li class="mui-table-view-cell">
				<a id='showCityPicker3' class="mui-navigate-right">
				 	<?php echo I('get.location')?I('get.location'):'区域';?>
				</a>
				<input type="hidden" name="location" id="locations" value="<?php echo I('get.location');?>">
            </li>
        </div>
        <div class="mui-col-sm-3 mui-col-xs-3">
            <li class="mui-table-view-cell">
				<a id='showUserPicker' class="mui-navigate-right">
					<?php echo I('get.money')?I('get.money'):'租金';?>
				</a>
				<input type="hidden" name="money" value="<?php echo I('get.money');?>" id="moneys">
            </li>
        </div>
        <div class="mui-col-sm-3 mui-col-xs-3">
            <li class="mui-table-view-cell">
				<a id='order' class="mui-navigate-right">					
					<?php echo I('get.order')?I('get.order'):'排序';?>
				</a>
				<input type="hidden" name="order" value="<?php echo I('get.orders');?>" id="orders">
            </li>
        </div>	
        <div class="mui-col-sm-3 mui-col-xs-3">
            <li class="mui-table-view-cell">
				<a id='more' class="mui-navigate-right">
					<?php echo I('get.rent')?I('get.rent'):'更多';?>
				</a>
				<input type="hidden" name="rent" value="<?php echo I('get.other');?>" id="other">
            </li>
        </div>	        	


	</div>
	<!-- end -->
	<input type="submit" value="提交" style="display:none;" id="sub"> 
</form>


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




		<script src="/house/Public/Home/js/mui.min.js"></script>
		<script src="/house/Public/Home/js/mui.picker.min.js"></script>
		<script src="/house/Public/Home/js/mui.poppicker.js"></script>
		<script src="/house/Public/Home/js/city.data-3.js" type="text/javascript" charset="utf-8"></script>
		<!-- <script src="/house/Public/Home/js/app.js"></script> -->
		<script type="text/javascript" charset="utf-8">
			mui.init({
				swipeBack:true //启用右滑关闭功能
			});

		</script>

<script>
	
			(function($, doc) {
				$.init();
				$.ready(function() {
					//普通示例
					var userPicker = new $.PopPicker();
					userPicker.setData([{
						value: '',
						text: '不限'
					}, {
						value: ',1000',
						text: '1000以下'
					}, {
						value: '1000,2000',
						text: '1000-2000'
					}, {
						value: '2000,3000',
						text: '2000-3000'
					}, {
						value: '3000,4000', 
						text: '3000-4000'
					},{
						value: '5000,', 
						text: '5000以上'
					}
					]);
					var showUserPickerButton = doc.getElementById('showUserPicker');
					var userResult = doc.getElementById('userResult');
					var moneys=doc.getElementById('moneys');
					var sub=doc.getElementById('sub');
					showUserPickerButton.addEventListener('tap', function(event) {
						userPicker.show(function(items) {
							var values=items[0];
							moneys.value=values.value;
							sub.click(); 
						});
					}, false);
					//-----------------------------------------

					//-----------------------------------------
					//					
					var cityPicker3 = new $.PopPicker({
						layer: 3
					});
					cityPicker3.setData(cityData3);
					var showCityPickerButton = doc.getElementById('showCityPicker3');
					var cityResult3 = doc.getElementById('cityResult3');
					var locations=doc.getElementById('locations');
					var sub=doc.getElementById('sub');
					showCityPickerButton.addEventListener('tap', function(event) {

						cityPicker3.show(function(items) {
							var city=(items[0] || {}).text + "-" + (items[1] || {}).text + "-" + (items[2] || {}).text;
							// console.log( locations );
							locations.value=city;

							sub.click(); 
						});
					}, false);
					/**********************************************************************/
					//排序
					var orderPicker = new $.PopPicker();
					orderPicker.setData([{
						value: 'id asc',
						text: '默认排序'
					}, {
						value: 'money desc',
						text: '价格从高到低'
					}, {
						value: 'money asc',
						text: '价格从低到高'
					}, {
						value: 'area asc',
						text: '面积从大到小'
					}, {
						value: 'area desc', 
						text: '面积从小到大'
					}]);
					var order = doc.getElementById('order');
					var orders=doc.getElementById('orders');
					var sub=doc.getElementById('sub');
					order.addEventListener('tap', function(event) {
						orderPicker.show(function(items) {
							var values=items[0];
							// console.log( values );
							orders.value=values.value;
							sub.click(); 
							// order.innerText = JSON.stringify(items[0]);
	
						});
					}, false);
					//-----------------------------------------
					//2级联示例 更多
					var moreData= 
							[
								{
									value: '110000',
									text: '租住方式',
									children: [
										{
											value: "合租",
											text: "合租"
										}, {
											value: "整租",
											text: "整租"
										}
									],
								},
								// {
								// 	value: '110000',
								// 	text: '性别',
								// 	children: [
								// 		{
								// 			value: "110101",
								// 			text: "不限"
								// 		}, {
								// 			value: "110102",
								// 			text: "男"
								// 		},{
								// 			value: "110102",
								// 			text: "女"
								// 		}
								// 	],
								// }
							];
					var cityPicker = new $.PopPicker({
						layer: 2
					});
					cityPicker.setData(moreData);
					var morebtn = doc.getElementById('more');
					var other = doc.getElementById('other');
					var sub=doc.getElementById('sub');
					morebtn.addEventListener('tap', function(event) {
						cityPicker.show(function(items) {
							var values=items[0].text + " " + items[1].text;
							other.value=values;
							sub.click(); 
						});
					}, false);
					//-----------------------------------------		


				});
			})(mui, document);
		</script>

</script>



	</body>

</html>
<script>
    $(function () {
    	$('.mui-tab-item').removeClass('mui-active');
    	$('.house').addClass('mui-active');
    });

function submit(){
	// alert(1);
	$('#nameForm').submit();
}

</script>