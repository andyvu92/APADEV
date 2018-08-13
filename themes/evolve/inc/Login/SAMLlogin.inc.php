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
		
		/**
		 * need request urls
		 * $urlReturn = SSO endpoint;
		 * $type = "JSON";
		 * $variable = array of ID, token and Return data;
		 */
		
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
	
	
	// log-out
	if(isset($_POST["logout"])) {
		// same with this commend.
		// isset($_SESSION["Log-in"])
		logoutManager();
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
			// logged in

			$retrunSSO["UserId"] = $Got["UserId"];
			$retrunSSO["UserName"] = $Got["UserName"];
			$retrunSSO["Email"] = $Got["Email"];
			$retrunSSO["FirstName"] = $Got["FirstName"];
			$retrunSSO["LastName"] = $Got["LastName"];
			$retrunSSO["Title"] = $Got["Title"];
			$retrunSSO["LinkId"] = $Got["LinkId"];
			$retrunSSO["CompanyId"] = $Got["CompanyId"];
			$retrunSSO["TokenId"] = $Got["TokenId"];
			$retrunSSO["Server"] = $Got["Server"];
			$retrunSSO["Database"] = $Got["Database"];
			$retrunSSO["AptifyUserID"] = $Got["AptifyUserID"];

			return $retrunSSO;
		}
	}

?>
<?php if(isset($_SESSION["Log-in"])): ?>
	<p>This page cannot be called directly after logged in!!!!!</p>
	<div class="pull-right borderLeftForTop DashboardPadding">
		<div id="DashboardButton" class="ButtonIconHolder withButtonIcon DashboardwithButtonIcon" title="Dashboard">
			<i class="Dashboard">&nbsp;</i>
		</div>
	</div>
	<div class="pull-right borderLeftForTop LogOutPadding">
		<form method="POST" action="<?php echo $url; ?>" name="forlogout">
			<input id="logoutAcButton"type="hidden" name="logout" value="out" style="display: none;" />
			<div id="logoutButton" class="ButtonIconHolder withButtonIcon OutwithButtonIcon" title="Log out">
				<input type="submit" value="log-out" />
			</div>
		</form>
	</div>
<?php else: ?>
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
<?php endif; ?>

<!-- Modal log-in -->


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
<script type="text/javascript">
$(document).ready(function(){	
	var x = $( document ).height() - $('.sticky-wrapper').height() - $('#section-bottom').height() - 130;
	$('#block-block-264').css({ "height": x });
});		
</script>