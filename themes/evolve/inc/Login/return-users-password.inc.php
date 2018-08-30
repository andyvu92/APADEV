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
			<h3 class="light-lead-heading cairo">Welcome to our new website.</h3>
			<span class="sub-heading">From now on you should use the email address linked to your APA membership to login.</span>
			<span class="sub-heading">But first, let's reset your password.</span>
			</br>
			<span class="sub-heading">Enter your email address below.</span>
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
					$('#checkMessage').addClass("display-none");
					$("submit-btn input").removeClass("stop");
				}
				else{
					$('#checkMessage').removeClass("display-none");
					$("submit-btn input").addClass("stop");
				}					
				}
				});
	}
</script>
</div>
<?php logRecorder(); ?>