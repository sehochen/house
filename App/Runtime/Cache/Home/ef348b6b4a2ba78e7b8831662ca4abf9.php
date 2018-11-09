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
			<a class="mui-icon mui-icon-left-nav mui-pull-left" onclick="JavaScript:history.go(-1);"></a>
			<h1 class="mui-title"> 房东信息 </h1>
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

			    	<span class="mui-badge"><?php echo $info['sex']==1?'男':'女';?></span>
			    	<span class="mui-badge"><?php echo ($info["age"]); ?></span> <br>
			    	<span> <?php echo ($info["area"]); ?> </span> <br>
			    </center>
			   	    	
		    </li>
		    <li class="mui-table-view-cell">
		    	<span class="mui-col-sm-3 mui-col-xs-3">说明：</span>
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
		    	<span style="border-left:3px solid rgba(0,122,255,0.5);padding-left:1%;">房东评价</span>
		    </li>

		    <li class="mui-table-view-cell">

<!-- 			<div class="comm_list">
				<span class="mui-badge"> 全部 </span>
				<span class="mui-badge mui-badge-primary"> 值得推荐 </span>
				<span class="mui-badge"> 有待改善 </span>
				<span class="mui-badge"> 问题很多 </span>

			</div> -->

			<form action="/house/index.php/Comment/index/uid/4" method="get" id="form">
				<select name="option" id="option">
					<option value="" >全部</option>
					<option value="值得推荐" <?php echo I('get.option')=='值得推荐'?'selected':null ;?> >值得推荐</option>
					<option value="还不错" <?php echo I('get.option')=='还不错'?'selected':null ;?>>还不错</option>
					<option value="有待改善" <?php echo I('get.option')=='有待改善'?'selected':null ;?>>有待改善</option>
					<option value="问题很多" <?php echo I('get.option')=='问题很多'?'selected':null ;?>>问题很多</option>
					<option value="极度恶劣" <?php echo I('get.option')=='极度恶劣'?'selected':null ;?>>极度恶劣</option>
				</select>
			</form>

				<ul class="mui-table-view">


<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
						<a href="javascript:;" class="">
							<img class="mui-media-object mui-pull-left" src="/house/Public/<?php echo ($vo["head"]); ?>">
							<div class="mui-media-body">
								<strong> 
									<span style="color:black;">
										<?php echo $vo['anonymity']==1?'匿名用户':$vo['nickname'] ;?> 
								</strong> <br>
								<span style="float:right;margin-top:-1.8em;"><?php echo date('Y-m-d H:i',$vo['add_time']);?></span>

								<p class="mui-ellipsis mui-icon mui-icon-location" style="font-size:14px;">
								 	<?php echo ($vo["area"]); ?> 
								</p>
								<p style="color:black;">
									<?php echo ($vo["content"]); ?>
								</p>
							</div>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>

				</ul>

				

		    </li> 
		</ul>

	</div>

	<center>
		<input type="button" value=" 我要评价房东 " style="margin:0.5em 0;" onclick="javascript:window.location='/house/index.php/Comment/add/uid/<?php echo I('get.uid');?>' ">
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

    	$("#option").change(function(){
    		$("#form").submit();
    	});

    });

</script>