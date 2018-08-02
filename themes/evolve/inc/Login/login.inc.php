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
		//print_r($output);
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
			echo "<br>log-in fail";
		} else {
			// logged in
			//print_r($result);
			
			$_SESSION["LogInFirstTime"] = "T";

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
		}
	}
	
	function logoutManager() {
		// 2.2.8 - log-out
		// Send - 
		// 
		// Response -
		// 
		$result = GetAptifyData("8", "logout");
		//print_r($result);
		deleteSession();
		//echo "logged out";
	}
?>
<?php
/******* shopping cart number + icon change *****/
$type = "PD";
$counts = 0;
if(isset($_SESSION['UserId'])) {
	$userID = $_SESSION['UserId'];
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	/********Get user shopping product form APA server******/
	try {
		$type="PD";
		$shoppingcartGetPD= $dbt->prepare('SELECT ID, productID, meetingID,coupon FROM shopping_cart WHERE userID= :userID AND type= :type');
		$shoppingcartGetPD->bindValue(':userID', $userID);
		$shoppingcartGetPD->bindValue(':type', $type);
		$shoppingcartGetPD->execute();
		$counts += count($shoppingcartGetPD);
		$shoppingcartGetPD= null;               
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	try {
		$type="PDNG";
		$shoppingcartGetPDNG= $dbt->prepare('SELECT ID, productID, meetingID,coupon FROM shopping_cart WHERE userID= :userID AND type= :type');
		$shoppingcartGetPDNG->bindValue(':userID', $userID);
		$shoppingcartGetPDNG->bindValue(':type', $type);
		$shoppingcartGetPDNG->execute();
		$counts += count($shoppingcartGetPDNG);
		$shoppingcartGetPDNG= null;               
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	$dbt = null;
	/********End get user shopping product form APA server******/
} else {
	$userID = '';
	$counts = 0;
}
?>
<?php if($counts == 0): ?>
<div class="pull-right borderLeftForTop ShoppingCartBorder" title="Shopping cart">
	<div class="ButtonIconHolder">
		<div class="ShoppingCartEmpty">0</div>
	</div>
</div>
<?php else: ?>
<div class="pull-right borderLeftForTop ShoppingCartBorder" title="Shopping cart">
	<div class="ButtonIconHolder">
		<div class="ShoppingCart"><?php echo $counts; ?></div>
	</div>
</div>
<?php endif; ?>
<?php if(isset($_SESSION["Log-in"])): ?>
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

<?php // bobber top showing name ?>

<!--div style="float: right;">
<form method="POST" action="<?php echo $url; ?>" name="getData">
	<input type="hidden" name="Getdata" value="out" style="display: none;" />
	<input type="submit" value="Get Data" />
</form>
</div-->
<?php else: ?>
<div class="pull-right borderLeftForTop LogInPadding">
	<button class="info" data-target="#loginAT" data-toggle="modal" type="button">
	<div class="ButtonIconHolder withButtonIcon InwithButtonIcon" title="Log-in">
		<i class="Log-in">&nbsp;</i>Log-in
	</div></button>
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
			<p>Not a member? <a href="jointheapa">Join us today</a>.</p>
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
<?php if(isset($_SESSION['LogInFirstTime'])): ?>
<div class="GetCentreLayout">
	<div class="ASection">
		<div class="Desktop">
			<p>Welcome <b><?php if(isset($_SESSION['FirstName'])) {echo $_SESSION['FirstName'];} ?>!</b></p>
		</div>
		<div class="Mobile">
			<p>Welcome <b><?php if(isset($_SESSION['FirstName'])) {echo $_SESSION['FirstName'];} ?>!</b></p>
		</div>
	</div>
</div>
<?php unset($_SESSION['LogInFirstTime']); ?>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function(){
	$('.GetCentreLayout .ASection .Desktop')
		.animate({ "padding-left": "1px" }, 500 )
		.animate({ "margin-top": "0px" }, 300 )
		.animate({ "padding-left": "1px" }, 3000 )
		.animate({ "margin-top": "-84px" }, 300 );
	
	$('.GetCentreLayout .ASection .Mobile')
		.animate({ "padding-left": "1px" }, 500 )
		.animate({ "margin-top": "0px" }, 300 )
		.animate({ "padding-left": "1px" }, 3000 )
		.animate({ "margin-top": "-70px" }, 300 );
		
	$('.submit').click( function() {
		var text = $("#bloodhound input[type=text].tt-input").val();
		if(text != "" || text != " " || text != null) {
			var rss = text.split(" ");
			var num = rss.length;
			var suburb = "";
			for(var i = 0; i < num-2; i++) {
				suburb += rss[i];
				if(i < num-3){
					suburb += " ";
				}
			}
			$('.stateComp').val(rss[num-2]+"");
			$('.suburbComp').val(suburb+"");
			$('.postcodeComp').val(rss[num-1]+"");
		}
	});
});		
</script>