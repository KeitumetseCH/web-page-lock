<?php
include("includes/session-config-inc.php");
include("includes/status-inc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="" type="image/vnd.microsoft.icon"/>

  <title>Web Page Lock</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <script>
	$(document).ready(function(){
      	<?php
        //Show password input modal
      		if($stage != 2){
				echo '$("#otp-modal").modal("show");';
            }
      	?>
	});
	function captchaVerify(){
      //Remove disable attribute on the Verify submit button
	    var subVCBtn = document.querySelector("#verifyCaptchaLogin");
	    subVCBtn.removeAttribute("disabled");
	}
	</script>
</head>

<body id="page-top">
  <?php if($stage == 2){ ?>
  <!-- Play Your webpage here --><div>Access granted</div>
  <?php } ?>
	<div class="modal fade" id="otp-modal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#39A7DF">
          <h4 class="modal-title title-colour" style="color:#FFF">Login <?php echo $loginStep; ?></h4>
        </div>
        <div class="modal-body">
          <div id="otp-sent" class="text-center"><?php echo $OTPtext; ?></div>
            <form method="post" id="myForm" action="includes/login-inc.php" enctype="multipart/form-data">
              <div class="row">
                <?php
                //Open password and recaptcha inputs
                if($stage == 0){
                  ?>
                    <div class="col-sm-9">
                      <input type="password" id="pagePassword" name="pagePassword" class="form-control" placeholder="Enter Password"/>
                      <div class="g-recaptcha recaptcha-spacing" style="margin-top:20px" data-callback="captchaVerify" data-sitekey="Your recaptcha site key"></div>
                    </div>
                    <div class="col-sm-3">
                      <button type="submit" class="btn up-con btn-primary" style="float:right;" id="verifyCaptchaLogin" name="verifyCaptchaLogin" disabled>Verify</button>
                    </div>
              <?php  } ?>
                <?php
                //Open OTP input
                if($stage == 1){
                  ?>
                	<div class="col-sm-9">
                      	<input type="text" id="pageOTP" name="pageOTP" class="form-control" placeholder="Enter OTP" required/>
                    </div>
                    <div class="col-sm-3">
                      	<button type="submit" class="btn up-con btn-primary" style="float:right;" id="pageLogin" name="pageLogin">Login</button>
                    </div>
              <?php } ?>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
