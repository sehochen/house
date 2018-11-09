<?php

	require_once('class.phpmailer.php');
	require_once("class.smtp.php"); 

 
	define('MAIL_HOST', 'smtp.163.com');//smtp服务器的名称
	define('MAIL_SMTPAUTH', true);//启用smtp认证
	define('MAIL_USERNAME', 'sirlong1993@163.com');//你的邮箱名
	define('MAIL_FROM', 'sirlong1993@163.com');//发件人地址
	define('MAIL_FROMNAME', 'sloan');//发件人姓名
	define('MAIL_PASSWORD', 'leldxtcctdsmjkmf');//授权邮箱密码
	define('MAIL_CHARSET', 'utf-8');//设置邮件编码
	define('MAIL_ISHTML', true);// 是否HTML格式邮件




	$to="81001985@qq.com";
	$title='标题';
	$content='内容';

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
        echo '发送成功！';
    }else{
        echo '发送失败！';
    }

?>