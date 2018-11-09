<?php if (!defined('THINK_PATH')) exit();?>
<!-- 底部导航 -->
<nav class="mui-bar mui-bar-tab">
            <a class="mui-tab-item mui-active" href="/a/house/index.php/Index/index">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">首页</span>
            </a>
            <a class="mui-tab-item house" href="/a/house/index.php/House/lists ">
                <span class="mui-icon mui-icon-settings"></span>
                <span class="mui-tab-label">找房</span>
            </a>            
            <a class="mui-tab-item message" href="/a/house/index.php/Message">
                <span class="mui-icon mui-icon-chatboxes"></span>
                <span class="mui-tab-label">消息</span>
            </a>
            <a class="mui-tab-item person" href="/a/house/index.php/User/index">
                <span class="mui-icon mui-icon-person"></span>
                <span class="mui-tab-label">我的</span>
            </a>
</nav>

<script src="/a/house/Public/Home/js/mui.min.js"></script>
<script>

    //点击li时，执行foo_1函数
    mui(".mui-bar").on("tap","a",foo_1);

    function foo_1(){
      // console.log("foo_1 execute");
      window.location=this.href;
    }

</script>
<script src="/a/house/Public/Home/js/jquery.min.js"></script>