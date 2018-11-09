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
		</style>
	</head>

	<body>

<header id="header" class="mui-bar mui-bar-nav">
			<a class="mui-icon mui-icon-left-nav mui-pull-left" onclick="JavaScript:history.go(-1);"></a>
			<h1 class="mui-title"> 评价房东 </h1>
</header>


<!-- 内容 -->
<div class="mui-content">

<form action="/house/index.php/Comment/add/uid/4" method="post" id="form">

	<!-- 印象 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">我对房东印象</span>
		    </li>
		    <li class="mui-table-view-cell">
				<select name="option" id="">
					<option value="值得推荐"> 值得推荐</option>
					<option value="还不错"> 还不错</option>
					<option value="有待改善"> 有待改善</option>
					<option value="问题很多"> 问题很多</option>
					<option value="极度恶劣"> 极度恶劣</option>
				</select>

		    </li> 
		</ul>

	</div>

<input type="hidden" name="to_id" value="<?php echo I('get.uid');?>">


	<!-- 评价 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">评价(100字以内)</span>
		    </li>
		    <li class="mui-table-view-cell">
				<textarea placeholder="请输入你要评价房东的话" rows="4" name="content"></textarea>
		    </li> 
		</ul>

	</div>

	<!-- 承诺 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">其它</span>
		    </li>

		    <li>
				<li class="mui-table-view-cell">
					<div class="mui-input-row mui-checkbox mui-left">
						<label>匿名评价</label>
						<input name="anonymity" value="1" type="checkbox" >
					</div>

				</li>

		    </li>
		</ul>
	</div>



</form>	

	<center>
		<input type="button" value=" 确 定 发 表 " style="margin:0.5em 0;" onclick="submit('/house/index.php/Comment/add/uid/4')">
	</center>


</div>
<!-- 内容end -->


<br><br><br>

<?php echo W('Menu/footer');?> 


</body>
</html>


<script>
    $(function () {
    	$('.mui-tab-item').removeClass('mui-active');
    	$('.house').addClass('mui-active');
    });

</script>
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
		      		window.location="/house/index.php/Comment/index/uid/<?php echo I('get.uid');?> ";
		      	},2000);
		      }
		      
		    }
		);

	}
	 
</script>