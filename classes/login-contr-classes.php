<?php
class LoginContr extends Login{
  private $human;
  private $accessCode;

  public function __construct($human, $accessCode){
    $accessCode = htmlspecialchars($accessCode);
    $this->human = $human;
    $this->accessCode = $accessCode;
  }

  public function LoginUser(){
    if($this->emptyInput() == false){
      header("location: ../index.php?error=emptyInput");
      exit();
    }
    $this->checkUser($this->human, $this->accessCode);
  }

  public function testOtp(){
    if(empty($this->accessCode)){
      header("location: ../index.php?error=otpEmpty");
      exit();
    }
    $this->checkOtp($this->accessCode);
  }

  private function emptyInput(){
    $result;
    if(empty($this->human) || empty($this->accessCode)){
      $result = false;
    }else{
      $result = true;
    }
    return $result;
  }
}
