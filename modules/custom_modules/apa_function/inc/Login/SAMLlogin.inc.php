<?php
	// current page's url. log-in to the same page before log-in.
	$url =  "{$_SERVER['REQUEST_URI']}";
	$wrong = false;
	$outputs;
	// log-in
	if(isset($_POST["idso"])) {
		echo "start!<br>";
		if(!empty($_POST["remember"])) {
			setcookie ("member_login",$_POST["idso"],time()+ (10 * 365 * 24 * 60 * 60));
			setcookie ("member_password",$_POST["passwordso"],time()+ (10 * 365 * 24 * 60 * 60));
		} else {
			if(isset($_COOKIE["member_login"])) {
				setcookie ("member_login","");
			}
			if(isset($_COOKIE["member_password"])) {
				setcookie ("member_password","");
			}
		}
		$outputs = loginSSO($_POST["idso"], $_POST["passwordso"]);
		
		if(sizeof($outputs) == 2) {
			$wrong = true;
		} else {
			//$variable = JSONArrayConverter("json",$returns);
			$_SESSION["outputReturn"] = $outputs;
			header("Location: /sso");
			exit;
		}
	} else {
		// no id has been entered
		echo "tf";
	}
	
	// forgot password
	if(isset($_POST["Fid"])) {
		$input["email"] = $_POST["Fid"];
		$output = GetAptifyData("6", $input);
		//print_r($output);
	}

	function loginSSO($id, $pass) {
		// 2.2.7 - log-in
		// Send - 
		// UserID, User password
		// Response -
		// log-in
		$arrIn["ID"] = $id;
		$arrIn["Password"] = $pass;
		$Got = GetAptifyData("7", $arrIn);
		logRecorder();
		if(isset($Got["ErrorInfo"])) {
			//echo $Got["ErrorInfo"]["ErrorMessage"];
			return ["log-in fail", $Got["ErrorInfo"]["ErrorMessage"]];
		} else {
			$ThirdParty = $_SESSION["thirdParty"];
			$LoginStatus = "1";
			$options = "Initial login slnpage";
			// logged in
			$returnSSO["UserId"] = $Got["UserId"];
			$returnSSO["UserName"] = $Got["UserName"];
			$returnSSO["Email"] = $Got["Email"];
			$returnSSO["FirstName"] = $Got["FirstName"];
			$returnSSO["LastName"] = $Got["LastName"];
			$returnSSO["Title"] = $Got["Title"];
			$returnSSO["LinkId"] = $Got["LinkId"];
			$returnSSO["CompanyId"] = $Got["CompanyId"];
			$returnSSO["TokenId"] = $Got["TokenId"];
			$returnSSO["Server"] = $Got["Server"];
			$returnSSO["Database"] = $Got["Database"];
			$returnSSO["AptifyUserID"] = $Got["AptifyUserID"];

			$RecordAll = json_encode($returnSSO, true);
			$date = date('Y-m-d h:i:s');
			// Create db data
			$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
			// Create log
			
			$SSOlogCreate = $dbt->prepare('INSERT INTO ssolog (Provider, User, Token, LogDateTime, LogIO, Data, OptionString) VALUES (:Provider, :User, :Token, :LogDateTime, :LogIO, :Data, :Option)');
			$SSOlogCreate->bindParam(':Provider', $ThirdParty);
			$SSOlogCreate->bindParam(':User', $returnSSO["UserName"]);
			$SSOlogCreate->bindParam(':Token', $returnSSO["TokenId"]);
			$SSOlogCreate->bindParam(':LogDateTime', $date);
			$SSOlogCreate->bindParam(':LogIO', $LoginStatus);
			$SSOlogCreate->bindParam(':Data', $RecordAll);
			$SSOlogCreate->bindParam(':Option', $options);
			if(!$SSOlogCreate->execute()) {
				echo "<br />RunFail- SSOlogCreate<br>";
				print_r($SSOlogCreate->errorInfo());
			}

			// Create data
			$SSODataCreate = $dbt->prepare('INSERT INTO ssodata (Token, DateTime, Data) VALUES (:Token, :DateTime, :Data)');
			$SSODataCreate->bindParam(':Token', $returnSSO["TokenId"]);
			$SSODataCreate->bindParam(':DateTime', $date);
			$SSODataCreate->bindParam(':Data', $RecordAll);
			if(!$SSODataCreate->execute()) {
				echo "<br />RunFail- SSODataCreate<br>";
				print_r($SSODataCreate->errorInfo());
			}

			$SSOlogCreate = null;
			$SSODataCreate = null;
			$dbt = null;

			return $returnSSO;
		}
	}

?>
<?php if(!isset($_SESSION["Log-in"])): ?>
	<?php if($wrong): ?>
	<h2>Your log-in failed!</h2>
	<p><?php echo $outputs[1]; ?></p>
	<div id="loginAT" role="dialog">
	<div class="modal-dialog"><!-- Modal content-->
		<div class="modal-content">

		<div class="modal-body">
			<div class="form-container">
				<h4 class="modal-title">Sign in to your account</h4>
				<form method="POST" action="<?php echo $url; ?>" name="forLogin">
					<input id="id" name="idso" placeholder="Email address" type="email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" />
					<input id="password" placeholder="Password" name="passwordso" type="password" required value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" />
					<input id="fromlogin" name="fromlogin" type="hidden" value="1" style="display: hidden;" />
					<input type="submit" value="Login" />
					<p><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /><label for="remember">Remember me</label><a class="forgotPS" data-dismiss="modal" data-toggle="modal" data-target="#passwordReset" >Forgot password?</a></p>
				</form>
				<p>Not a member? <a href="jointheapa">Join us today</a>.</p>
				<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
		</div>
	</div>
	</div>
	<?php else: ?>
	<div id="loginAT" role="dialog">
	<div class="modal-dialog"><!-- Modal content-->
		<div class="modal-content">

		<div class="modal-body">
			<div class="form-container">
				<h4 class="modal-title">Sign in to your account</h4>
				<form method="POST" action="<?php echo $url; ?>" name="forLogin">
					<input id="id" name="idso" placeholder="Email address" type="email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" />
					<input id="password" placeholder="Password" name="passwordso" type="password" required value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" />
					<input type="submit" value="Login" />
					<p><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /><label for="remember">Remember me</label><a class="forgotPS" data-dismiss="modal" data-toggle="modal" data-target="#passwordReset" >Forgot password?</a></p>
				</form>
				<p>Not a member? <a href="jointheapa">Join us today</a>.</p>
				<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
		</div>
	</div>
	</div>
	<?php endif; ?>
	<!-- Modal forgot password -->
	<div class="modal fade" id="passwordReset" role="dialog">
	<div class="modal-dialog"><!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
			<button class="close" data-dismiss="modal" type="button">×</button>
			<h4 class="modal-title">Reset password</h4>
		</div>

		<div class="modal-body">
			<form method="POST" action="<?php echo $url; ?>" name="resetPass">
				<label for="id">ID</label>
				<input id="Fid" name="Fid" placeholder="ID" type="text" />
				<input type="submit" value="submit" />
			</form>
		</div>
		<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
		</div>
		</div>
	</div>
	</div>
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function(){	
	var x = $( document ).height() - $('.sticky-wrapper').height() - $('#section-bottom').height() - 130;
	$('#block-block-264').css({ "height": x });
});		
</script>