<?php

	$url =  "{$_SERVER['REQUEST_URI']}";
	// log-out
	if(isset($_POST["logouttt"])) {
		// same with this commend.
		$LoginStatus = '0';
		$date = date('Y-m-d h:i:s');
		// isset($_SESSION["Log-in"])
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		$dataDelete = $dbt->prepare('DELETE FROM ssodata WHERE Token = :Token');
		$dataDelete->bindParam(':Token', $_SESSION['TokenId']);
		if(!$dataDelete->execute()) {
			echo "<br />RunFail- Mstr<br>";
			print_r($dataDelete->errorInfo());
		}
		$dataDelete = null;

		$SSOlogCreate = $dbt->prepare('INSERT INTO ssolog (Provider, User, Token, LogDateTime, LogIO, OptionString) VALUES (:Provider, :User, "log-out", :LogDateTime, :LogIO, "log-out")');
		$SSOlogCreate->bindParam(':Provider', $_SESSION["thirdParty"]);
		$SSOlogCreate->bindParam(':User', $_SESSION["UserName"]);
		$SSOlogCreate->bindParam(':LogDateTime', $date);
		$SSOlogCreate->bindParam(':LogIO', $LoginStatus);
		if(!$SSOlogCreate->execute()) {
			echo "<br />RunFail- Mstr<br>";
			print_r($SSOlogCreate->errorInfo());
		}
		$SSOlogCreate = null;

		logoutManager();
		
		///echo "here!";
		header("Location: /pageA");
		exit;
	}
	//echo "there!";
	function logoutManager() {
		// 2.2.8 - log-out
		// Send - 
		// 
		// Response -
		// 
		$result = GetAptifyData("8", "logout");
		//print_r($result);
		deleteSession();
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