<?php

	$url =  "{$_SERVER['REQUEST_URI']}";
	

	// when a user is coming from a log-in
	if(isset($_SESSION["outputReturn"])) {
		unset($_SESSION["thirdParty"]);
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
		
		//TODO
		// go back to page A. Will be replaced with SAML response
		header("Location: /pageA");
		exit;
		// detail is created!!
		// need to configure how we are going to set the messages
	} else {
		
		if(isset($_SESSION["Log-in"]) && isset($_SESSION['TokenId'])) {
			// send response when they are already logged in
			//TODO
			// Get third party, this is temp.
			$ThirdParty = "thirdparty after log-in";
			$outputData = Array();
			// update database
			$date = date('Y-m-d h:i:s');
			// Create db data
			$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
			// Get data existed
			$SSODataGet = $db->prepare('SELECT * FROM ssodata WHERE Token = :Token');
			$SSODataGet->bindParam(':Token', $_SESSION['TokenId']);
			if(!$SSODataGet->execute()) {
				echo "<br />RunFail- Mstr<br>";
				print_r($SSODataGet->errorInfo());
			}
			// Using this data to update data file and create new log.
			foreach($SSODataGet as $outoutData) {
				// record ID for update log
				$thisID = $outoutData["ID"];
				// record data
				$outputData = $outoutData['data'];
				// Create log
				$SSOlogCreate = $dbt->prepare('INSERT INTO ssolog (Provider, Token, LogDateTime, LogIO, Data, Option) VALUES (:Provider, :Token, :LogDateTime, :LogIO, :Data, :Option)');
				$SSOlogCreate->bindParam(':Provider', $ThirdParty);
				$SSOlogCreate->bindParam(':Token', $_SESSION['TokenId']);
				$SSOlogCreate->bindParam(':LogDateTime', $date);
				$SSOlogCreate->bindParam(':LogIO', "1");
				$SSOlogCreate->bindParam(':Data', $outoutData['data']);
				$SSOlogCreate->bindParam(':Option', "Already logged_in");
				if(!$SSOlogCreate->execute()) {
					echo "<br />RunFail- Mstr<br>";
					print_r($SSOlogCreate->errorInfo());
				}
				$SSOlogCreate = null;

				// update data
				$SSODataUpdate = $db->prepare('UPDATE ssodata SET DateTime = :DateTime,
										 Data = :Data WHERE ID = :ID');
				$SSODataUpdate->bindParam(':DateTime', $date);
				$SSODataUpdate->bindParam(':Data', $outoutData['data']);
				$SSODataUpdate->bindParam(':ID', $thisID);
				if(!$SSODataUpdate->execute()) {
					echo "<br />RunFail- Mstr<br>";
					print_r($SSODataUpdate->errorInfo());
				}
				$SSODataUpdate = null;
				// only one data
				break;
			}
			$SSODataGet = null;

			//TODO
			// use this data: $outputData
			// Create SAML request
			// go back to page A. Will be replaced with SAML response
			header("Location: /pageA");
			exit;
		} else {
			// send users to log-in page for log-in
			$_SESSION["thirdParty"] = "Thirdparty";
			header("Location: /log-in");
			exit;
		}
		// or show this message if they are not coming from the expected source.

		echo "<p>This page cannot be called directly on the browser. it must receive a valid HTTP POST or GET/Redirect SAML 2 request.</p>";
	}

	//TODO
	// update database
	
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