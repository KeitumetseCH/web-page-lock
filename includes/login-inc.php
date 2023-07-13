<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include "../classes/generate-otp-classes.php";
  include "../classes/login-classes.php";
  include "../classes/login-contr-classes.php";

  if(isset($_POST["verifyCaptchaLogin"])){
    $recaptcha = $_POST["g-recaptcha-response"];
  	$secret_key = ""; //Your recaptcha secret key
    $human = false;

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => [
            'secret' => $secret_key,
            'response' => $recaptcha,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ],
        CURLOPT_RETURNTRANSFER => true
    ]);
    $googleResponse = curl_exec($ch);
    curl_close($ch);
    $googleResponse = json_decode($googleResponse);

    if(isset($googleResponse->success) && $googleResponse->success){
      $human = true;
    }
    $pagePassword = $_POST["pagePassword"];
    $human = true;

    $login = new LoginContr($human, $pagePassword);
    $login->loginUser();
  }
  if(isset($_POST["pageLogin"])){
    $pageOTP = $_POST["pageOTP"];
    $human = true;
    $login = new LoginContr($human, $pageOTP);
    $login->testOtp();
  }
}
