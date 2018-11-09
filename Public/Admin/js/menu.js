	$(function(){

		//点击特效
		$(".sysmenua ul li a").click(function(){	
			$(".sysmenua ul li a").removeClass('current');
			$(this).addClass('current');

			//切换副菜单
			var ids=$(this).attr("id");
			var title=$(this).text();
			$(".sysmenub").hide();
			$("#"+"tab_"+ids+" p").html(title)
			$("#"+"tab_"+ids).show();	
		});


		//副菜单点击特效
		$(".sysmenub ul li a").click(function(){	
			$(".sysmenub ul li a").removeClass('current');
			$(this).addClass('current');

			var title=$(this).text();
			// alert( title );
			$(".sinfotit").html( title );
			// $("#main").load("intro.html");
		});

	});