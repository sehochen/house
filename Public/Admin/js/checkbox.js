/**
 * checkbox选择
 */
$(document).ready(function(){
	$(".selectall").click(function(){
		var s=$(this).attr("src");
		var ids=$(this).attr("id");
		ids="."+ids;
		// console.log( ids );

		if(s.indexOf("up")>0){
			//未选中状态
			$(this).attr("src",path+"images/index/ck_down.gif");

			$(ids+" .chk").attr("src",path+"images/index/ck_down.gif");
			$(ids+" input:checkbox").attr("checked","checked");
		}
		else{
			$(this).attr("src",path+"images/index/ck_up.gif");

			$(ids+" .chk").attr("src",path+"images/index/ck_up.gif")
			$(ids+" input:checkbox").removeAttr("checked");
		}
	});

	$("#list .chk").click(function(){
		var s=$(this).attr("src");
		var ss=$(this).parent().attr("class");
		if(s.indexOf("up")>0){
			//未选中状态
			$(this).attr("src",path+"images/index/ck_down.gif");
			$(this).prev().attr("checked","checked");

			//选择父亲级别			
			$("#"+ss).attr("src",path+"images/index/ck_down.gif");
			$("#"+ss).prev().attr("checked","checked");
			// console.log( ss );
		}
		else{
			$(this).attr("src",path+"images/index/ck_up.gif");
			$(this).prev().removeAttr("checked");
			//选择父亲级别	
			$("#"+ss).attr("src",path+"images/index/ck_up.gif");
			$("#"+ss).prev().removeAttr("checked");	
		}
	});
});