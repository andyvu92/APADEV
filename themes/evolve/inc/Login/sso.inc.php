<?php

	$url =  "{$_SERVER['REQUEST_URI']}";
	
	// when a user is coming from a log-in
	if(isset($_SESSION["outputReturn"])) {
		
		$result = $_SESSION["outputReturn"];
		print_r($result);
		
		$id= $result["UserId"];
		$UserName= $result["UserName"];
		$Email= $result["Email"];
		$FirstName= $result["FirstName"];
		$LastName= $result["LastName"];
		$Title= $result["Title"];
		$LinkId= $result["LinkId"];
		$CompanyId= $result["CompanyId"];
		$TokenId= $result["TokenId"];
		$Server= $result["Server"];
		$Database= $result["Database"];
		$AptifyUserID= $result["AptifyUserID"];

		newSessionLogIn($id, $UserName, $Email, $FirstName, $LastName, $Title, $LinkId, $CompanyId, $TokenId, $Server, $Database, $AptifyUserID);
			
		$_SESSION["Log-in"] = "in";
		//echo "<br>logged in!!";
		
		$data = "UserID=".$_SESSION["UserId"];
		$details = GetAptifyData("4", $data,"");
		newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"]);
		
	} else {
		// no id has been entered
		echo "<p>This page cannot be called directly on the browser. it must receive a valid HTTP POST or GET/Redirect SAML 2 request.</p>";
	}
	
	/*
	// log-out
	if(isset($_POST["logout"])) {
		// same with this commend.
		// isset($_SESSION["Log-in"])
		
		// todo
		// figure this out later
		logoutManager();
	}
	
	// test get data
	if(isset($_POST["Getdata"])) {
		$data = "UserID=".$_SESSION["UserId"];
		$output = GetAptifyData("1", $data);
		print_r($output);
	}
	
	// forgot password
	if(isset($_POST["Fid"])) {
		$input["email"] = $_POST["Fid"];
		$output = GetAptifyData("6", $input);
		//print_r($output);
	}
	
	*/
?>
<p>sso page! </p>
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
<?php if(isset($_SESSION['Log-in'])): //check the TokenID from third part web site?>
<p>logged in!</p>
<?php else: ?>
<p>Not logged in!</p>
<?php endif; ?>
<?php logRecorder(); ?>