<?php

	$url =  "{$_SERVER['REQUEST_URI']}";
	// log-in
	if(isset($_POST["id"])) {
		if(!empty($_POST["remember"])) {
			setcookie ("member_login",$_POST["id"],time()+ (10 * 365 * 24 * 60 * 60));
			setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
		} else {
			if(isset($_COOKIE["member_login"])) {
				setcookie ("member_login","");
			}
			if(isset($_COOKIE["member_password"])) {
				setcookie ("member_password","");
			}
		}
		loginManager($_POST["id"], $_POST["password"]);
	} else {
		// no id has been entered
	}
	
	function loginManager($id, $pass) {
		// SAML SSO log-in
		// Send - 
		// UserID, User password
		// Response - SAML Assertion
		// log-in
		$arrIn["ID"] = $id;
		$arrIn["Password"] = $pass;
		$resultSAML = GetAptifyData("", $arrIn);
		if(isset($result["ErrorInfo"])) {
			//echo $result["ErrorInfo"]["ErrorMessage"];
			//echo "log-in fail";
		} else {
			// logged in
			//SAML response message;
			//SAML response message;
			//SAML response message;
			//SAML response message; put here
			
		}
	}
	
	function logoutManager() {
		// SSO - log-out
		// Send - 
		// 
		// Response -
		// 
		$result = GetAptifyData("", "logout");
		
	}
?>
<?php if(isset($_SESSION["TokenID"])): //check the TokenID from third part web site?>
<div>
	<form method="POST" action="<?php echo $url; ?>" name="forlogout">
		<input type="hidden" name="logout" value="out" style="display: none;" />
		<input type="submit" value="log-oout" />
	</form>
</div>

<?php else: ?>

	<div class="form-container">
			<h4 class="modal-title">Signle sign on your account</h4>
			<form method="POST" action="<?php echo $url; ?>" name="forLogin">
				<input id="id" name="id" placeholder="Email address" type="email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" />
				<input id="password" placeholder="Password" name="password" type="password" required value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" />
				<input type="submit" value="Login" />
				<p><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /><label for="remember">Remember me</label><a class="forgotPS" data-dismiss="modal" data-toggle="modal" data-target="#passwordReset" >Forgot password?</a></p>
			</form>
			
	</div>

<?php endif; ?>
<?php logRecorder(); ?>