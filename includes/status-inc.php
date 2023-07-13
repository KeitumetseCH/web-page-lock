<?php
session_start();
$OTPtext;

if(isset($_SESSION["otpPageCode"])){
  $otpPageCode = $_SESSION["otpPageCode"];
}else{
  $otpPageCode = "";
}

//Check the number of times the pages has been reloaded and destroy session if it has been loaded the second time with the wrong code
if(isset($_SESSION["loginSteps"])){
  if($_SESSION["loginSteps"] == 1 && $otpPageCode != "61H7YKf&#mq7"){
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
  }
}else{
  $_SESSION["loginSteps"] = 0;
}

//Check if there is a page code
if($otpPageCode == ""){
  $loginStep = "Step 1";
  $stage = 0;
}

//Check if OTP has been generated
if($otpPageCode == "l7n^Ud!*6Z4l2"){
  $stage = 1;
  $loginStep = "Step 2";
  $OTPtext = "OTP Sent to Website Owner.";
  $_SESSION["loginSteps"] = 1;
}

//Check if the corrected OTP was entered
if($otpPageCode == "61H7YKf&#mq7"){
  $stage = 2;
}
