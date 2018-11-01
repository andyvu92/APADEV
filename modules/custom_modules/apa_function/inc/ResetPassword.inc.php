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
		// todo
		?>
		<?php  if($output["success"] == 1 ||$output["success"] == "1"):?>

		<div class="flex-container" id="non-member">
			<div class="flex-cell">
				<h3 class="light-lead-heading">Password update successful</h3>
			</div>
			<div class="flex-cell cta">
				<a data-target="#loginAT" data-toggle="modal" href="#" class="login">Login</a>
				<a href="/" class="join">Back to home</a>
			</div>

			<?php 
					$block = block_load('block', '309');
					$get = _block_get_renderable_array(_block_render_blocks(array($block)));
					$output = drupal_render($get);        
					print $output;
			?>

		</div>

		<div class='TokenExist' style='display: none;'>1</div>

		<?php else:?>

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
				<div class="flexcell">
					<div class="checkMessage" id="reset-pw-fail"><span>Password update failed. Please try again or <a href="/contact-us">contact us</a></span></div>
				</div>

				<div class="flex-cell submit-btn">
					<button class="accent-btn" type="submit" id="saveNA">Submit</button>
				</div>
			</div>
		</form>
	</div>

	<div class='TokenExist' style='display: none;'>1</div>

		<?php endif;?>
		<?php
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