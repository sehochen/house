<?php

//上传
function upload(){
    $config =C('UPLOAD');  
    $upload = new \Think\Upload($config);// 实例化上传类    

    // 上传文件 
    $info   =   $upload->upload();
    if(!$info) {
        // 上传错误提示错误信息
        return $upload->getError();
    }else{
        // 上传成功 savename
        return $info['img']['savepath'].$info['img']['savename'];
    }
}


//上传多个
function uploads(){
    $config =C('UPLOAD');  
    $upload = new \Think\Upload($config);// 实例化上传类    
    static $img=array();

    // 上传文件 
    $info   =   $upload->upload();
    if(!$info) {
        // 上传错误提示错误信息
        return $upload->getError();
    }else{
        // 上传成功 savename
         foreach ($info as $k => $v) {
            $img[]= $v['savepath'].$v['savename'];
         }
         return $img;
    }
}


function email($to,$title,$content){
    require_once('./Plugs/mail/class.phpmailer.php');
    require_once("./Plugs/mail/class.smtp.php"); 
    $conf=C('EMAIL');
    define('MAIL_HOST', $conf['smtp']);//smtp服务器的名称 
    define('MAIL_SMTPAUTH', $conf['smtpAuth']);//启用smtp认证
    define('MAIL_USERNAME', $conf['username']);//你的邮箱名
    define('MAIL_FROM', $conf['from']);//发件人地址
    define('MAIL_FROMNAME', $conf['fromName']);//发件人姓名
    define('MAIL_PASSWORD', $conf['password']);//授权邮箱密码
    define('MAIL_CHARSET', $conf['charSet']);//设置邮件编码
    define('MAIL_ISHTML', $conf['isHtml']);// 是否HTML格式邮件



    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=MAIL_HOST; //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth =MAIL_SMTPAUTH; //启用smtp认证
    $mail->Username = MAIL_USERNAME; //你的邮箱名
    $mail->Password = MAIL_PASSWORD ; //授权邮箱密码
    $mail->From = MAIL_FROM; //发件人地址（也就是你的邮箱地址）
    $mail->FromName = MAIL_FROMNAME; //发件人姓名
    $mail->AddAddress($to,"尊敬的客户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(MAIL_ISHTML); // 是否HTML格式邮件
    $mail->CharSet=MAIL_CHARSET; //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示

    if( $mail->Send() ){
        // echo '发送成功！';
    }else{
        // echo '发送失败！';
    }



}