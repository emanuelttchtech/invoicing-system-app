<?php
session_start();
include "login_cred.php";
?>
<!DOCTYPE html>
<html>
<?php
include "head.php";
$type = md5('staff');
?>
<body class="body-b">
<div class="prof-bg" style="">	
	<div class="" style="">
		<div class="row">
		<div class="my-form-frame col-lg-5 mt-3" style="margin:0 auto!important">
			<div class="form-header">
				<div class="d-flex flex-row justify-content-between">
					<span ><a href="https://viconetgroup.com"><img src="img/go-back.svg"><label class="hrder-txt" style="margin-left: 10px;"><strong>Back</strong></label></a></span>
					<span ></span>
				</div>
				<div class="login-logo">
					<img src="img/TTCH-Technologies.png">
				</div>
			</div>
			<form method="post">
				<div><?php echo $disp ?></div>
				<div class="row">
					<div class="col-lg-12 form-group">
						<label class="input-label" for="user_email">Email</label>
						<input type="text" name="user_email" class="cust-input" id="user_email" oninput="checkEmail()" placeholder="Enter your email address">
						<div class="error-message"></div>
					</div>
					<div class="col-lg-12 form-group">
						<label class="input-label">Password</label>
						<input type="Password" name="user_password" class="cust-input"  placeholder="********">
					</div>
					
					<div class="col-lg-12 form-group">
						<button class="bton btn2" style="width: 100%" name="login_btn" id="login_btn">LOGIN</button>
					</div>
					<div class="col-lg-12 form-group">
						<label class=""><a href="forgot-password?t=<?php echo $type ?>" class="checkLink">Forgot Password</a></label>
					</div>										
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</body>
<!-- Javascripts -->
<script type="text/javascript" src="js/toggle.js"></script>
<script type="text/javascript" src="js/login-validation.js"></script>
<script src="js/button_click.js"></script>
</html>