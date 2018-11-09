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
			.select select{
				width:12%;
				/*margin-top: 500px;*/
			}
		</style>
	</head>

	<body>

<header id="header" class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title"> 发布房源 </h1>
</header>


<!-- 内容 -->
<div class="mui-content">

<form action="/house/index.php/Release/add" enctype="multipart/form-data" method="post">


	<!-- 添加照片 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">添加照片</span>
		    </li>
		    <li class="mui-table-view-cell upload_img">
				<img src="/house/Public/Home/images/add_img.png" alt="添加图片" id="1">
				<img src="/house/Public/Home/images/add_img.png" alt="添加图片" id="2">	
				<img src="/house/Public/Home/images/add_img.png" alt="添加图片" id="3">
				<img src="/house/Public/Home/images/add_img.png" alt="添加图片" id="4">
		    </li> 

		</ul>

	</div>

<!-- 图片上传 -->
<!-- <form id="myForm" method="post" action="http://www.baidu.com" enctype="multipart/form-data" target="upload">
    <input type="file" name="img[]" id="file1" style="display:none;" />
    <input type="file" name="img[]" id="file2" style="display:none;"/>
    <input type="file" name="img[]" id="file3" style="display:none;"/>
    <input type="file" name="img[]" id="file4" style="display:none;"/>
</form> -->

<iframe name="upload" style="display: none;"></iframe>

<script src="/house/Public/Home/js/jquery.min.js"></script>
<script>
    $(function () {
    	$(".upload_img img").click(function(){
    		var ids=$(this).attr("id");
    		// console.log(  ids );
    		
    		$("#file"+ids).click();
    		$("#file"+ids).change(function(){
    			$("#"+ids).attr("src","/house/Public/Home/images/upload_img.png");
    		});
    	});

        // $("#file").change(function () {
        //     $("#myForm").submit();
        // });
    });
</script>

<!-- 图片上传 -->


	<!-- 房源信息 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">房源信息</span>
		    </li>
		    <li class="mui-table-view-cell">
				<div class="mui-input-row">
					<label>小区名称</label>
					<input type="text" placeholder="小区名称" name="name">
				</div>
		    </li>
		    <li class="mui-table-view-cell">
				<div class="mui-input-row">
					<label>楼号</label>
					<input type="text" placeholder="楼号" name="number">
				</div>
		    </li> 
		    <li class="mui-table-view-cell">
				<div class="mui-input-row">
					<label>楼层/共几层</label>
					<input type="text" placeholder="例如：5/16" name="floor">
				</div>
		    </li> 
		    <li class="mui-table-view-cell">
				<div class="mui-input-row">
					<label>门牌号</label>
					<input type="text" placeholder="门牌号" name="nums">
				</div>
		    </li>
		    <li class="mui-table-view-cell">
				<div class="mui-input-row">
					<label>面积</label>
					<input type="text" placeholder="面积" name="area">
				</div>
		    </li>
		    <li class="mui-table-view-cell">
				<div class="mui-input-row">
					<label>租金</label>
					<input type="text" placeholder="租金" name="money">
				</div>
		    </li>

		    <li class="mui-table-view-cell">
				<div class="mui-input-row">
					<label>朝向</label>
					<input type="text" placeholder="朝向" name="direction">
				</div>
		    </li>

		    <li class="mui-table-view-cell">
		    	<div class="mui-input-row" >
					<label>户型</label>
					<div class="select">
				    	<select name="type1" id="" width="10px">
				    		<option value="">0</option>
				    		<option value="">1</option>
				    		<option value="">2</option>
				    		<option value="">3</option>
				    	</select>室
				    	<select name="type2" id="" width="10px">
				    		<option value="">0</option>
				    		<option value="">1</option>
				    		<option value="">2</option>
				    		<option value="">3</option>
				    	</select>厅

				    	<select name="type3" id="" width="10px">
				    		<option value="">0</option>
				    		<option value="">1</option>
				    		<option value="">2</option>
				    		<option value="">3</option>
				    	</select>卫					</div>
			    	
				</div>
		    </li>

		    <li class="mui-table-view-cell">
		    	<div class="mui-input-row">
					<label>装修</label>
			    	<select name="decoration" id="">
			    		<option value="">毛胚</option>
			    		<option value="">普通装修</option>
			    		<option value="">精装修</option>
			    		<option value="">豪华装修</option>
			    	</select>	
				</div>
		    </li>

		    <li class="mui-table-view-cell">
		    	<div class="mui-input-row">
					<label>租住方式</label>
			    	<select name="rent" id="">
			    		<option value="">合租</option>
			    		<option value="">整租</option>
			    		<option value="">日租</option>
			    	</select>	
				</div>
		    </li>

		    <li class="mui-table-view-cell">
		    	<div class="mui-input-row">
					<label>房间类型</label>
			    	<select name="room_type" id="">
			    		<option value="">主卧</option>
			    		<option value="">次卧</option>
			    	</select>	
				</div>
		    </li> 

		    <li class="mui-table-view-cell">
		    	<div class="mui-input-row">
					<label>交租方式</label>
			    	<select name="pay_ren" id="">
			    		<option value="">付三押一</option>
			    		<option value="">付二押一</option>
			    	</select>	
				</div>
		    </li> 

		    <li class="mui-table-view-cell">
		    	<div class="mui-input-row">
					<label>位置</label>
					<input type="text" placeholder="位置" id='showCityPicker' name="location">
				</div>
		    </li>

		    <li class="mui-table-view-cell">
		    	<div class="mui-input-row">
					<label>街道</label>
					<input type="text" placeholder="街道" name="street">
				</div>
		    </li>

		</ul>

	</div>





	<!-- 公用设施 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">配套设施(多选)</span>
		    </li>
		    <li class="mui-table-view-cell">
				<form class="mui-input-group">
					<div class="mui-input-row mui-checkbox mui-left">
						<label>冰箱</label>
						<input name="facilities[]" value="冰箱" type="checkbox">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>洗衣机</label>
						<input name="facilities[]" value="洗衣机" type="checkbox" checked="">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>宽带</label>
						<input name="facilities[]" value="宽带" type="checkbox" checked="">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>电视机</label>
						<input name="facilities[]" value="电视机" type="checkbox">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>厨房</label>
						<input name="facilities[]" value="厨房" type="checkbox" checked="">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>热水器</label>
						<input name="facilities[]" value="热水器" type="checkbox">
					</div						
				</form>
		    </li>
		</ul>

	</div>


	<!-- 对租客要求 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">对租客要求(多选)</span>
		    </li>
		    <li class="mui-table-view-cell">
				<form class="mui-input-group">
					<div class="mui-input-row mui-checkbox mui-left">
						<label>男生</label>
						<input name="demand[]" value="男生" type="checkbox">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>女生</label>
						<input name="demand[]" value="女生" type="checkbox" checked="">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>不喝酒</label>
						<input name="demand[]" value="不喝酒" type="checkbox" checked="">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>不吸烟</label>
						<input name="demand[]" value="不吸烟" type="checkbox">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>爱干净</label>
						<input name="demand[]" value="爱干净" type="checkbox" checked="">
					</div>
					<div class="mui-input-row mui-checkbox mui-left">
						<label>作息规律</label>
						<input name="demand[]" value="作息规律" type="checkbox">
					</div						
				</form>
		    </li>
		</ul>

	</div>







	<center>
		<input type="submit" value=" 确 定 发 布 " style="margin:0.5em 0;">
	</center>

	

</form>


</div>
<!-- 内容end -->




</body>
</html>
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

					//********************************************************************/
					//					//3级联示例
					var cityPicker3 = new $.PopPicker({
						layer: 3
					});
					cityPicker3.setData(cityData3);
					var showCityPickerButton = doc.getElementById('showCityPicker');
					var cityResult3 = doc.getElementById('cityResult3');
					showCityPickerButton.addEventListener('tap', function(event) {

						cityPicker3.show(function(items) {

							showCityPickerButton.value =(items[0] || {}).text + "-" + (items[1] || {}).text + "-" + (items[2] || {}).text;
						});
					}, false);
					/**********************************************************************/	


				});
			})(mui, document);
		</script>

</script>