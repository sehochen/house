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
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title"> 帮我预约 </h1>
</header>


<!-- 内容 -->
<div class="mui-content">

<form action="/house/index.php/Collect/add" method="post" id="form">	

	<!-- 预约看房时间 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">预约时间</span>
		    </li>
		    <li class="mui-table-view-cell">
		    	<input type="text" value="时间" onclick="dateTime(this)" name="time">
		    </li> 
		</ul>

	</div>


<input type="hidden" name="hid" value="<?php echo I('get.hid');?>">


	<!-- 其他要求 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">其他要求(可多选)</span>
		    </li>
		    <li class="mui-table-view-cell">

				<div class="mui-input-row mui-checkbox mui-left">
				  <label>能住两人</label>
				  <input name="other[]" value="能住两人" type="checkbox">
				</div>

				<div class="mui-input-row mui-checkbox mui-left">
				  <label>能养宠物</label>
				  <input name="other[]" value="能养宠物" type="checkbox">
				</div>
				<div class="mui-input-row mui-checkbox mui-left">
				  <label>能做饭</label>
				  <input name="other[]" value="能做饭" type="checkbox">
				</div>
				<div class="mui-input-row mui-checkbox mui-left">
				  <label>有独卫</label>
				  <input name="other[]" value="有独卫" type="checkbox">
				</div>
		    </li> 
		</ul>

	</div>


	<!-- 其他要求 -->
	<div class="mui-row" style="background-color:white;margin-top:1%;">
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		    	<textarea placeholder="如果你还有其他要求,请在这里备注" rows="4" name="remark"></textarea>
		    </li>
		</ul>
	</div>




</form>	


	<center>
		<input type="button" value=" 确 定 预 约 " style="margin:0.5em 0;" onclick="submit('/house/index.php/Collect/add')">
	</center>



</div>
<!-- 内容end -->



<br><br><br>

<?php echo W('Menu/footer');?> 





</body>
</html>
<script src="/house/Public/Home/js/mui.min.js"></script>
<script src="/house/Public/Home/js/mui.picker.min.js"></script>
<script src="/house/Public/Home/js/mui.poppicker.js"></script>
<script>
function dateTime(obj){
    var dtPicker = new mui.DtPicker(); 
    dtPicker.show(function (selectItems) { 
        // console.log(selectItems.y);//{text: "2016",value: 2016} 
        // console.log(selectItems.m);//{text: "05",value: "05"} 
        // console.log(selectItems.d);//{text: "2016",value: 2016} 
        // console.log(selectItems.h);//{text: "05",value: "05"} 
        // console.log(selectItems.i);//{text: "05",value: "05"} 
        // console.log( obj );
        obj.value =selectItems.y.value+"年-"+selectItems.m.value+"月-"+selectItems.d.value+"日 "+selectItems.h.value+":"+selectItems.i.value ;
    });
		
}

</script>
<script>
    $(function () {
    	$('.mui-tab-item').removeClass('mui-active');
    	$('.person').addClass('mui-active');
    });


	function submit(url){

		$.post(url, $("#form").serializeArray(),
		    function(data){
		      // console.log(data);
		      if( data.status==0 ){
		      	mui.toast(data.message);
		      }else{
		      	mui.toast(data.message);
		      	setTimeout(function(){
		      		window.location="/house/index.php/Appointment/index ";
		      	},2000);
		      }
		      
		    }
		);

	}
	 
</script>