<?php
class Login extends GenerateOTP{
  protected function checkUser($human, $accessCode){
    if($human && $accessCode == "kd6zTlH0sY72*"){
      if($this->genOTP()){
        session_start();
        $_SESSION["otpPageCode"] = "l7n^Ud!*6Z4l2";
        header("Location: ../index.php");
        exit();
      }else{
        header("Location: ../index.php?error=otpNotSent");
        exit();
      }
    }else{
      header("Location: ../index.php?error=incorrectPassword");
      exit();
    }
  }

  protected function checkOtp($accessCode){
    session_start();
    if($_SESSION["otp"] == $accessCode){
      $_SESSION["otpPageCode"] = "61H7YKf&#mq7";
      header("Location: ../index.php");
      exit();
    }else{
      header("Location: ../index.php?error=incorrectOTP");
      exit();
    }
  }
}
