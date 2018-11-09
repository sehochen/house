<?php
namespace Home\Widget;
use Think\Controller;

class MenuWidget extends Controller {

    //尾部
    public function footer(){
        return $this->fetch('Widget:footer');
    }
    
}

