<?php
class GenerateOTP{
  protected function genOTP(){
    session_start();
    $otp = mt_rand(1001,99999);
    $_SESSION["otp"] = $otp;

    $subject = "Access Request";
    $message = "<html>
                <head>
                <title>OTP Generated</title>
                </head>
                <body>
                <p>Good day,</p>
                <p>Someone is trying to access your website. If you did not request this OTP please ignore this email.</p>
                <p>This One-Time-Pin was generated to access your webpage: <span style='color:#39A7DF;font-weight:bold'>".$otp."</span></p>
                <p>Regards<br>Webmaster</p>
                </body>
                </html>
                ";

    $to = "info@yourdomain.com";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <otp@yourdomain.com>' . "\r\n";

    if(mail($to,$subject,$message,$headers)){
      return true;
    }else{
      return false;
    }
  }
}
