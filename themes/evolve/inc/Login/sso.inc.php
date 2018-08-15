<?php

	$url =  "{$_SERVER['REQUEST_URI']}";
	$date = date('Y-m-d h:i:s');

	// when a user is coming from a log-in
	if(isset($_SESSION["outputReturn"])) {
		//unset($_SESSION["thirdParty"]);
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
		
		// log-in done
		unset($_SESSION["outputReturn"]);
		//TODO
		// go back to page A. Will be replaced with SAML response
		header("Location: /pageA");
		exit;
		// detail is created!!
		// need to configure how we are going to set the messages
	} else {
		
		$oldData = false;

		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		$SSODataGet = $dbt->prepare('SELECT * FROM ssodata WHERE Token = :Token');
		$SSODataGet->bindParam(':Token', $_SESSION['TokenId']);
		if(!$SSODataGet->execute()) {
			echo "<br />RunFail- Mstr<br>";
			print_r($SSODataGet->errorInfo());
		}
		foreach($SSODataGet as $outoutData) {
			$datetime1 = new DateTime($date);
			$datetime2 = new DateTime($outoutData["DateTime"]);
			$diffs = date_diff($datetime1, $datetime2);
			// tt days difference from the time it is created
			$tt = $diffs->format('%a');
			// format example: $diffs->format('%R%a days %H:%I:%S');
			
			if($tt >= 7) {
				// it has been 7 days since the log or session is created.
				// re-direct them to log-in with removing this data
				$oldData = true;
			}
			
		}

		if($oldData) {
			// the data in the database is old.
			// delete the data
			$dataDelete = $dbt->prepare('DELETE FROM ssodata WHERE Token = :Token');
			$dataDelete->bindParam(':Token', $_SESSION['TokenId']);
			if(!$dataDelete->execute()) {
				echo "<br />RunFail- dataDelete<br>";
				print_r($dataDelete->errorInfo());
			}
			$dataDelete = null;
			// Create log (old log-out)
			$LoginStatus = "0";
			$SSOlogCreate = $dbt->prepare('INSERT INTO ssolog (Provider, User, Token, LogDateTime, LogIO, OptionString) VALUES (:Provider, :User, "old log-out", :LogDateTime, :LogIO, "Old data: '.$tt.' days")');
			$SSOlogCreate->bindParam(':Provider', $_SESSION["thirdParty"]);
			$SSOlogCreate->bindParam(':User', $_SESSION["UserName"]);
			$SSOlogCreate->bindParam(':LogDateTime', $date);
			$SSOlogCreate->bindParam(':LogIO', $LoginStatus);
			if(!$SSOlogCreate->execute()) {
				echo "<br />RunFail- SSOlogCreate<br>";
				print_r($SSOlogCreate->errorInfo());
			}
			$SSOlogCreate = null;
			// log them out.
			logoutManager();
			
			// send response when they are already logged in
			//TODO
			// Get third party, this is temp.
			$ThirdParty = "thirdparty after log-in";

			// this user need to log-in again
			// send users to log-in page for log-in
			$_SESSION["thirdParty"] = $ThirdParty;
			header("Location: /log-in");
			exit;
		} elseif(isset($_SESSION["Log-in"]) && isset($_SESSION['TokenId'])) {
			// send response when they are already logged in
			//TODO
			// Get third party, this is temp.
			$ThirdParty = "thirdparty after log-in";
			$outputData = Array();
			$date = date('Y-m-d h:i:s');
			$User = $_SESSION["UserName"];
			// Create db data
			$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
			// Get data existed
			$SSODataGet = $dbt->prepare('SELECT * FROM ssodata WHERE Token = :Token');
			$SSODataGet->bindParam(':Token', $_SESSION['TokenId']);
			if(!$SSODataGet->execute()) {
				echo "<br />RunFail- Mstr<br>";
				print_r($SSODataGet->errorInfo());
			}
			// Using this data to update data file and create new log.
			foreach($SSODataGet as $outoutData) {
				// record ID for update log
				$thisID = $outoutData["ID"];
				$LoginStatus = '1';
				// record data
				$outputData = $outoutData['Data'];
				// Create log
				$SSOlogCreate = $dbt->prepare('INSERT INTO ssolog (Provider, User, Token, LogDateTime, LogIO, Data, OptionString) VALUES (:Provider, :User, :Token, :LogDateTime, :LogIO, :Data, "Already logged_in ssopage")');
				$SSOlogCreate->bindParam(':Provider', $ThirdParty);
				$SSOlogCreate->bindParam(':User', $User);
				$SSOlogCreate->bindParam(':Token', $_SESSION['TokenId']);
				$SSOlogCreate->bindParam(':LogDateTime', $date);
				$SSOlogCreate->bindParam(':LogIO', $LoginStatus);
				$SSOlogCreate->bindParam(':Data', $outputData);
				if(!$SSOlogCreate->execute()) {
					echo "<br />RunFail- SSOlogCreate<br>";
					print_r($SSOlogCreate->errorInfo());
				}
				$SSOlogCreate = null;

				// update data
				$SSODataUpdate = $dbt->prepare('UPDATE ssodata SET DateTime = :DateTime,
										 Data = :Data WHERE ID = :ID');
				$SSODataUpdate->bindParam(':DateTime', $date);
				$SSODataUpdate->bindParam(':Data', $outputData);
				$SSODataUpdate->bindParam(':ID', $thisID);
				if(!$SSODataUpdate->execute()) {
					echo "<br />RunFail- SSODataUpdate<br>";
					print_r($SSODataUpdate->errorInfo());
				}
				$SSODataUpdate = null;
				// only one data
				break;
			}
			$SSODataGet = null;
			$dbt = null;
			
			//TODO
			// use this data: $outputData
			// Create SAML request
			// go back to page A. Will be replaced with SAML response
			header("Location: /pageA");
			//exit;
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