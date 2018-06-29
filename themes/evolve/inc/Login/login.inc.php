<?php
//include('sites/all/themes/evolve/inc/Aptify/AptifyAPI.inc.php');
	/*
	 * Log-in and Log-out manager
	 * Manage the entire log in and out here 
	 **/
	// current page's url. log-in to the same page before log-in.
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
		print_r($output);
	}
	
	function loginManager($id, $pass) {
		// 2.2.7 - log-in
		// Send - 
		// UserID, User password
		// Response -
		// log-in
		$arrIn["ID"] = $id;
		$arrIn["Password"] = $pass;
		$result = GetAptifyData("7", $arrIn);
		if(isset($result["ErrorInfo"])) {
			echo $result["ErrorInfo"]["ErrorMessage"];
			echo "log-in fail";
		} else {
			// logged in
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
			echo "<br>logged in!!";
			
			$data = "UserID=".$_SESSION["UserId"];
			$details = GetAptifyData("4", $data,"");
			newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"]);
		}
	}
	
	function logoutManager() {
		// 2.2.8 - log-out
		// Send - 
		// 
		// Response -
		// 
		$result = GetAptifyData("8", "logout");
		print_r($result);
		deleteSession();
		echo "logged out";
	}
?>
<?php if(isset($_SESSION["Log-in"])): ?>
<div style="float: right;">
	<form method="POST" action="<?php echo $url; ?>" name="forlogout">
		<input type="hidden" name="logout" value="out" style="display: none;" />
		<input type="submit" value="log-oout" />
	</form>
</div>
<form method="POST" action="<?php echo $url; ?>" name="getData">
	<input type="hidden" name="Getdata" value="out" style="display: none;" />
	<input type="submit" value="Get Data" />
</form>
<?php else: ?>
<div style="float: right;">
	<button class="info" data-target="#loginAT" data-toggle="modal" type="button">Log-in</button>
</div>
<?php endif; ?>

<!-- Modal log-in -->
<div class="modal fade" id="loginAT" role="dialog">
<div class="modal-dialog"><!-- Modal content-->
	<div class="modal-content">

	<div class="modal-body">
		<button class="close" data-dismiss="modal" type="button">×</button>
		<div class="form-container">
			<h4 class="modal-title">Sign in to your account</h4>
			<form method="POST" action="<?php echo $url; ?>" name="forLogin">
				<input id="id" name="id" placeholder="Email address" type="email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" />
				<input id="password" placeholder="Password" name="password" type="password" required value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" />
				<input type="submit" value="Login" />
				<p><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /><label for="remember">Remember me</label><a class="forgotPS" data-dismiss="modal" data-toggle="modal" data-target="#passwordReset" >Forgot password?</a></p>
			</form>
			<p>Not a member? <a href="">Join us today</a>.</p>
			<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
		</div>
	</div>
	</div>
</div>
</div>

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
<?php logRecorder(); ?>