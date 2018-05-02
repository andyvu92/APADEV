<?php
	/*
	 * Log-in and Log-out manager
	 * Manage the entire log in and out here 
	 **/
	// current page's url. log-in to the same page before log-in.
	$url =  "{$_SERVER['REQUEST_URI']}";
	
	// log-in
	if(isset($_POST["id"])) {
		//echo $_POST["id"] . " / " . $_POST["password"];
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
	
	function loginManager($id, $pass) {
		$arr = Array();
		// 2.2.7 - log-in
		// Send - 
		// UserID, User password
		// Response -
		// log-in
		$arrIn["ID"] = $id;
		$arrIn["Password"] = $pass;
		array_push($arr, $arrIn);
		$result = GetAptifyData("7", $arrIn);
		if(isset($result["ErrorInfo"])) {
			echo $result["ErrorInfo"]["ErrorMessage"];
			echo "log-in fail";
		} else {
			// logged in
			$_SESSION["Log-in"] = "in";
			echo "<br>logged in!!";
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
		unset($_SESSION['Log-in']);
		echo "logged out";
	}
?>
<?php if(isset($_SESSION["Log-in"])): ?>
<div style="float: right;">
	<form method="POST" action="<?php echo $url; ?>" name="forLogin">
		<input type="hidden" name="logout" value="out" style="display: none;" />
		<input type="submit" value="log-oout" />
	</form>
</div>
<?php else: ?>
<div style="float: right;">
	<button class="info" data-target="#loginAT" data-toggle="modal" type="button">Log-in</button>
</div>
<?php endif; ?>
<!-- Modal -->

<div class="modal fade" id="loginAT" role="dialog">
<div class="modal-dialog"><!-- Modal content-->
	<div class="modal-content">
	<div class="modal-header">
		<button class="close" data-dismiss="modal" type="button">×</button>
		<h4 class="modal-title">Log-in</h4>
	</div>

	<div class="modal-body">
		<form method="POST" action="<?php echo $url; ?>" name="forLogin">
			<label for="id">ID</label>
			<input id="id" name="id" placeholder="ID" type="text" />
			<label for="password">Password:</label>
			<input id="password" name="password" type="password" />
			<input type="submit" value="submit" />
		</form>
	</div>
	<div class="modal-footer">
	<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
	</div>
	</div>
</div>
</div>