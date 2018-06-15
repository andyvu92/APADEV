<?php
	if(isset($_GET["Token"])) {
		// change password
		echo "<div class='TokenExist' style='display: none;'>0</div>";
		?>
	<form id="NewPass" name="formradio" action="/resetpassword" method="POST">
		<input type="hidden" name="Token" value="<?php echo $_GET["Token"]; ?>" placeholder="" id="hidden">
		<label for="UserName">UserName</label>
		<input type="text" required="true" name="UserName" placeholder="UserName" id="UserName">
		<label for="NPassword">New password</label>
		<input type="password" required="true" name="NPassword" placeholder="New password" id="NPassword">
		<label for="CfNPassword">Confirm New password</label>
		<input type="password" class="form-control" placeholder="Confirm password" id="CfNPassword" name="CfNPassword">
		<button type="Submit" class="btn btn-default" id="saveNA">Submit</button>
	</form>
		<?php
	} elseif(isset($_POST["UserName"])) {
		// do update!
		$input["UserName"] = $_POST["UserName"];
		$input["Password"] = $_POST["NPassword"];
		$input["Token"] = $_POST["Token"];
		$output = GetAptifyData("6", $input);
		print_r($output);
		// todo
		if($output["success"] == 1 ||$output["success"] == "1") {
			
		}
		echo "<h1>Password update success!!</h1>";
		echo "<p>Please wait..</p>";
		echo "<div class='TokenExist' style='display: none;'>1</div>";
	} else {
		// when user come here for no reason.
		echo "<h1>Session expired!!</h1>";
		echo "<div class='TokenExist' style='display: none;'>1</div>";
	}
	echo "<div class='TTTTT'>click here!</div>";
?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	if($(".TokenExist").text() == "1") {
		/*
		setTimeout(function() {
		  window.location.href = "/";
		}, 1500);
		*/
	} else if($(".TokenExist").text() == "2") {
		/*
		setTimeout(function() {
		  window.location.href = "/";
		}, 1500);
		*/
	};
	$(".TTTTT").click(function(){
	    window.location.href = "/";
	});
	$("#NewPass").validate({
        rules: {
			NPassword: {
				required: true,
				minlength: 6
			}, CfNPassword: {
				required: true,
				minlength: 6,
				equalTo: "#NPassword"
            }
        }, messages: {
			NPassword: {
				required: "Please enter a new password",
				minlength: "Your password must be at least 6 characters long",
			}, CfNPassword: {
				required: "Please confirm your password",
				minlength: "Your password must be at least 6 characters long",
				equalTo:"Please enter the same password",
			}
        }
    });
});
</script>