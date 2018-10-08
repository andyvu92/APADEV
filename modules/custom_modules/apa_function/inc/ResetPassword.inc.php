<?php
	if(isset($_GET["Token"])) {
		// change password
		echo "<div class='TokenExist' style='display: none;'>0</div>";
		?>
	<div id="reset-password-form">
		<form id="NewPass" name="formradio" action="/resetpassword" method="POST">
			<div class="flex-container">
				<div class="flex-cell user-info">
					<h3 class="light-lead-heading cairo">Reset your password:</h3>
				</div>
				
				<div class="flex-cell email-field">
					<input type="hidden" name="Token" value="<?php echo $_GET["Token"]; ?>" placeholder="" id="hidden">
					<input class="form-control" type="text" required="true" name="UserName" placeholder="Email address" id="UserName">
				</div>

				<div class="flex-cell password-field">
					<input class="form-control" type="password" required="true" name="NPassword" required pattern=".{8,}" placeholder="New password" id="NPassword" onkeyup="PasswordFunction(this.value)">
				</div>

				<div class="flexcell">
					<div class="checkMessage" id="PasswordMessage"><span></span></div>
				</div>

				<div class="flex-cell password-field">
					<input class="form-control" type="password" class="form-control" required pattern=".{8,}" placeholder="Confirm new password" id="CfNPassword" name="CfNPassword" onkeyup="checkPasswordFunction(this.value)">
				</div>

				<div class="flexcell">
					<div class="checkMessage" id="checkPasswordMessage"><span></span></div>
				</div>

				<div class="flex-cell submit-btn">
					<button class="accent-btn" type="submit" id="saveNA">Submit</button>
				</div>
			</div>
		</form>
	</div>
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
			// success
			echo "<h1>Password update success!!</h1>";
			echo "<p>Please wait..</p>";
			echo "<div class='TokenExist' style='display: none;'>1</div>";
		} else {
			// when failed
			echo "<h1>Password update failed</h1>";
			echo "<p>Please try again..</p>";
			echo "<div class='TokenExist' style='display: none;'>1</div>";
		}
	} else {
		// when user come here for no reason.
		echo "<h1>Session expired!!</h1>";
		header("Location: /forget-password", true, 301);
		exit();
		echo "<div class='TokenExist' style='display: none;'>1</div>";
	}
	echo "<div class='TTTTT'>click here!</div>";
?>
<?php logRecorder(); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
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

function PasswordFunction(ps){
	if($('#NPassword').val().length <= 7){
		$('#PasswordMessage').html("8 characters minimum");
		$( "#NPassword" ).focus();
		$("#NPassword").css("border", "1px solid #ffa02e");
		$("#saveNA").addClass("stop");
	}
	else{
		$('#PasswordMessage').html("");
		$( "#NPassword" ).blur();
		$("#NPassword").css("border", "");
		$("#saveNA").removeClass("stop");
	}					
}

function checkPasswordFunction(Password) {
	if($('#NPassword').val()!= Password){
		$('#checkPasswordMessage').html("Your passwords do not match");
		$( "#CfNPassword" ).focus();
		$("#CfNPassword").css("border", "1px solid #ffa02e");
		$("#saveNA").addClass("stop");
	}
	else{
		$('#checkPasswordMessage').html("");
		$( "#CfNPassword" ).blur();
		$("#CfNPassword").css("border", "");
		$("#saveNA").removeClass("stop");
	}					
}
</script>