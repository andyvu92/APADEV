<?php
	$url =  "{$_SERVER['REQUEST_URI']}";
	// forgot password
	if(isset($_POST["Fid"])) {
		$input["email"] = $_POST["Fid"];
		$output = GetAptifyData("6", $input);
		//print_r($output);
	}
?>
<div id="forgot-pw-form">   
<form method="POST" action="<?php echo $url; ?>" name="resetPass" id="resetPass">
	<div class="flex-container">
		<div class="flex-cell user-info">
			<h3 class="light-lead-heading cairo">Forgot your password?</h3>
			<span class="sub-heading">Submit your email address and we'll send you a link to reset your password</span>
		</div>
		
		<div class="flex-cell">
			<div class="email-field">
				<input class="form-control" id="Fid" name="Fid" onchange="checkEmailFunction(this.value)" placeholder="Email address" type="text">
			</div>
			<div id="checkMessage" class="display-none">
			<span>Oops! The email you entered does not exist.</span>
			<span>Please try another email address or join the APA today.</span>
			</div>
		</div>

		<div class="flex-cell submit-btn">
			<input type="submit" value="Submit">
		</div>
		
	</div>
</form>
<script>
	function checkEmailFunction(email) {
				jQuery.ajax({
				url:"/sites/all/themes/evolve/inc/jointheAPA/jointheAPA-checkEmail.php", 
				type: "POST", 
				data: {CheckEmailID: email},
				success:function(response) { 
				var result = response;
				if(result=="T"){
					return;
				}
				else{
					$('#checkMessage').removeClass("display-none");
					$( "#Memberid" ).focus();
					$("#Memberid").css("border", "1px solid red");
					$(".accent-btn").addClass("stop");
				}					
				}
				});
	}
</script>
<script>
	jQuery(document).ready(function(){
		$('#Fid').on('keyup', function(){
			console.log('asd');
			$(this).trigger('checkEmailFunction');
		});
	});
</script>
</div>
<?php logRecorder(); ?>