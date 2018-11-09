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
			<a class="mui-icon mui-icon-left-nav mui-pull-left" href="/house/index.php/User/index"></a>
			<h1 class="mui-title"> 个人信息 </h1>
			<a class="mui-action-back mui-icon mui-icon-gear mui-pull-right"></a>
</header>


<!-- 内容 -->
<div class="mui-content">


	<!-- 头像 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
			    <center>
			    	<img class="head" src="/house/Public/<?php echo ($info["head"]); ?>" width="30%"> <br>

<!-- head upload -->
<form id="myForm" method="post" action="/house/index.php/User/head" enctype="multipart/form-data" target="upload">
    <input type="file" name="img" id="file" style="display:none;" />
</form>

<iframe name="upload" style="display:none;"></iframe>
<!-- end upload -->

			    </center>
			   	    	
		    </li>
		</ul>

	</div>

<input type="hidden" name="uid" value="<?php echo ($info["uid"]); ?>" id="uid">

	<!-- 信息 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    <span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">个人信息</span>
				<div class="mui-col-sm-4 mui-col-xs-4">

		            <li class="mui-table-view-cell" style="border-top:none;">
				    	<div class="mui-input-row">
				    		<label>昵称</label>
							<input type="text" placeholder="用户名" name="nickname" value="<?php echo ($info["nickname"]); ?>" id="nickname">
						</div>
		            </li>	

		            <li class="mui-table-view-cell" style="border-top:none;">
				    	<div class="mui-input-row">
					    	<div class="mui-input-row">
					    		<label>性别</label>
					    		<input type="text" id="sex" value="<?php echo ($info['sex']==1?'男':'女'); ?>">
								<input type="hidden" name="sex" id="sex_value" value="<?php echo ($info["sex"]); ?>" >
							</div>
						</div>
		            </li>	

					<li class="mui-table-view-cell" style="border-top:none;">
						<label style="margin-left:6%;margin-right:15%;">年龄</label>
						<div class="mui-numbox">
							<button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
							<input class="mui-input-numbox" type="number" name="age" value="<?php echo ($info["age"]); ?>" id="age">
							<button class="mui-btn mui-btn-numbox-plus" type="button">+</button>
						</div>
					</li>

		            <li class="mui-table-view-cell" style="border-top:none;">
				    	<div class="mui-input-row">
				    		<label>地区</label>
							<input type="text" placeholder="用户名" name="area" value="<?php echo ($info["area"]); ?>" id='showCityPicker'>
						</div>
		            </li>	
	
		            <li class="mui-table-view-cell" style="border-top:none;">
				    	<div class="mui-input-row">
				    		<label>手机</label>
							<input type="number" placeholder="手机" name="phone" value="<?php echo ($info["phone"]); ?>" id="phone">
						</div>
		            </li>

		            <li class="mui-table-view-cell" style="border-top:none;">
				    	<div class="mui-input-row">
				    		<label>邮箱</label>
							<input type="email" placeholder="邮箱" name="email" value="<?php echo ($info["email"]); ?>" id="email">
						</div>
		            </li>

		            <li class="mui-table-view-cell" style="border-top:none;">
						<div class="mui-input-row" style="margin: 10px 5px;">
							<textarea id="desc" rows="5" placeholder="个人签名" name="desc"><?php echo ($info["desc"]); ?></textarea>
						</div>
		            </li>

		            <li class="mui-table-view-cell" style="border-top:none;">
				    	<div class="mui-input-row">
							<center>
						    	<input type="button" value="修改" onclick="submit('/house/index.php/User/info')">
						    	&nbsp;&nbsp;&nbsp;&nbsp;
						    	<input type="reset" value="取消">								
							</center>

						</div>
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
						value: '1',
						text: '男'
					},{
						value: '0',
						text: '女'
					}
					]);
					var showUserPickerButton = doc.getElementById('sex');
					var sex_value = doc.getElementById('sex_value');
					var userResult = doc.getElementById('userResult');
					showUserPickerButton.addEventListener('tap', function(event) {
						userPicker.show(function(items) {
							var values=items[0];
							// console.log( values.value);
							sex_value.value=values.value;
							showUserPickerButton.value = values.text;

						});
					}, false);
					//-----------------------------------------

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
<!-- <script src="/house/Public/Home/js/jquery.min.js"></script> -->
<script>
	function submit(url){
		var uid=$("#uid").val();
		var nickname=$("#nickname").val();
		var sex=$("#sex_value").val();
		var age=$("#age").val();
		var area=$("#showCityPicker").val();
		var phone=$("#phone").val();
		var email=$("#email").val();
		var desc=$("#desc").val();		

		data={"desc":desc,"uid":uid,"nickname":nickname,"sex":sex,"age":age,"area":area,"phone":phone,"email":email };
		// console.log( data );

		$.post(url, data,
		    function(data){
		      // console.log(data);
		      if( data.status==0 ){
		      	mui.toast(data.message);
		      }else{
		      	mui.toast(data.message);
		      	// setTimeout(function(){
		      	// 	window.location="/house/index.php/User/info";
		      	// },2000);
		      }
		      
		    }
		);

	}
	 
</script>
<script>
    $(function () {
    	$('.mui-tab-item').removeClass('mui-active');
    	$('.person').addClass('mui-active');


        $(".head").click(function () {
            $("#file").click();
        });

        $("#file").change(function () {

            $("#myForm").submit();

            mui.toast('上传头像');

		    setTimeout(function(){
            	$.get("/house/index.php/User/headinfo", function(data){
			  	// console.log(data.message);
			  	$(".head").attr('src',"/house/Public/"+data.message); 

			});
	      	},1000);           


        });
    });
</script>