<?php
	$url =  "{$_SERVER['REQUEST_URI']}";
	// forgot password

	if(isset($_POST["Fid"])) :
		$input["email"] = $_POST["Fid"];
		$output = GetAptifyData("6", $input);
		//print_r($output);
?>
<div id="forgot-pw-form">   

<form method="POST" action="/" name="resetPass" id="resetPasst">
	<div class="flex-container">
		<div class="flex-cell user-info">
			<h3 class="light-lead-heading cairo">An email has been sent to you</h3>
			<span class="sub-heading">Please follow the prompts to reset your password.</span>
			<span class="sub-heading">Click the button below to go back to the homepage or wait for <span id="timer">15</span> seconds to be redirected.</span>
			</br>
		</div>
		<div class="flex-cell submit-btn">
			<input type="submit" value="Go back">
		</div>
		
	</div>
</form>
<script>
	var count = 16;
	function countDown(){
		var timer = document.getElementById("timer");
		if(count > 0){
			count--;
			timer.innerHTML = count;
			setTimeout("countDown()", 1000);
			console.log(count);
		}else{
			window.location.href = "/";
		}
	}
	countDown();
</script>
</div>
<?php else: ?>	
<div id="forgot-pw-form">   
<form method="POST" action="<?php echo $url; ?>" name="resetPass" id="resetPass">
	<div class="flex-container">
		<div class="flex-cell user-info">
			<h3 class="light-lead-heading cairo">Welcome to our new website.</h3>
			<span class="sub-heading">From now on you should use the email address linked to your APA membership as your username.</span>
			<span class="sub-heading">But first, let's reset your password.</span>
			</br>
			<span class="sub-heading">Enter your email address below.</span>
		</div>

		<div class="flex-cell">
			<div class="email-field-alt">
				<input class="form-control" id="Fid" name="Fid" onchange="checkEmailFunction(this.value)" placeholder="Email address" type="text">
			</div>
			<div id="checkMessage" class="display-none">
				<span>Oops! The email you entered does not exist.</span>
				<span>Please try another email address or join the APA today.</span>
			</div>
			
		</div>

		<div class="flex-cell submit-btn">
			<input id="checkpassword" type="submit" value="Submit">
		</div>
		
	</div>
</form>
<script>
	jQuery(document).ready(function(){
		$('#checkpassword').click(function(){
			if($("#Fid").val()=="") {
				if( $('#resetPass').find('.checkMessage').length == 0 ){
					emptyMessage = '<div class="checkMessage"><span>Email field cannot be empty.</span></div>';
					$('#checkMessage').one().after(emptyMessage);
				}
				return false;
			}
		});
				
		var targetKey = "@";

		$('#Fid').keyup(function(event) {
			$('.checkMessage').remove();

		if($('#Fid').val() == targetKey) {
			email = $('#Fid').val();
			jQuery.ajax({
				url:"apa/checkemail", 
				type: "POST", 
				data: {CheckEmailID: email},
				success:function(response) { 
				var result = response;
				if(result=="T"){
					$('#checkMessage').addClass("display-none");
					$("#Fid").removeClass("focuscss");
					$("#checkpassword").removeClass("stop");
				}
				else{
					$('#checkMessage').removeClass("display-none");
					$("#Fid").addClass("focuscss");
					$("#checkpassword").addClass("stop");
					return false;
				}					
				}
				});
		}
		else{}
			targetKey = $('#Fid').val();
		});

		var timer = null;
		$('#Fid').keydown(function(){
			clearTimeout(timer); 
			timer = setTimeout(validateEmail, 1000)
		});

		function validateEmail() {
			email = $('#Fid').val();
			jQuery.ajax({
				url:"apa/checkemail", 
				type: "POST", 
				data: {CheckEmailID: email},
				success:function(response) { 
				var result = response;
				if(result=="T"){
					$('#checkMessage').addClass("display-none");
					$("#Fid").removeClass("focuscss");
					$(".submit-btn input").removeClass("stop");
				}
				else{
					$('#checkMessage').removeClass("display-none");
					$("#Fid").addClass("focuscss");
					$(".submit-btn input").addClass("stop");
					return false;
				}					
				}
				});
		}
	});
</script>
</div>
<?php
endif;
logRecorder();
?>