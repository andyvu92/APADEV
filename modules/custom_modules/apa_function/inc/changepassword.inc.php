<?php
apa_function_updateBackgroundImage_form();
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/
  ?>
<?php
// 2.2.9 - Change password
// Send - 
// UserID, old password, new password
// Response -
// 
if(isset($_SESSION["Log-in"])) : ?>
<?php	// when logged in;
	if(isset($_POST["Password"])): ?>
<?php
	//echo "password is there: asdasd";
	$data["userID"] = $_SESSION["UserName"];
	$data["Password"] = $_POST["Password"];
	$data["New_password"] = $_POST["New_password"];
	//print_r($data);
  $product = GetAptifyData("9", $data); 
  
	//echo $product["Update"]."!!";
  //print_r($product);

  if(isset($product) && $product['Error'] != ""):
    ?>

    <!-- WRONG CURRENT PASSWORD -->
<div id="pre_background" style="display:none">background_<?php echo $background;  ?></div>
<?php apa_function_dashboardLeftNavigation_form(); ?> 
<div class="col-xs-12 col-md-10 background_<?php echo $background; ?>" id="dashboard-right-content">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="col-xs-12"><span class="dashboard-name"><strong>Change your password</strong></span></div>
         <!--<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>-->
      </div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
		<form id="changePasswordForm" action="changepassword" method="POST">
		   <div class="changePassword">
			  <div class="row">
				 <div class="col-lg-6">
					 	<label>Current password</label>
						<input type="password" class="form-control" placeholder="Current password" id="Cpassword" value="" name="Password">
						<a href="/forget-password">Don't know your password?</a>
				 </div>
				</div>
				<div class="row">
				 <div class="col-lg-6">
            <span id="PasswordMessage">Your password is incorrect. Please try again.</span>
  				</div>
        </div>
			  <div class="row">
				 <div class="col-lg-6">
				 	<label>New password</label>
					<input type="password" class="form-control" placeholder="New password" id="New_password" name="New_password">
				 </div>
			  </div>
			  <div class="row">
				 <div class="col-lg-6">
				 	<label>Confirm new password</label>
					<input type="password" class="form-control" placeholder="Confirm new password" id="Confirm_password" name="Confirm_password">
				 </div>
				</div>
				<div class="row">
				 <div class="col-lg-6">
           <span id="checkPasswordMessage" style="display: none"></span>
				 </div>
        </div>
        <div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   <button  class="accent-btn change-password-button"><span class="dashboard-button-name">Save</span></button></div>
        </div>
		   </div>
		</form>

				 </div>
   </div>
</div>

<script>
  jQuery(document).ready(function(){
		$('#Cpassword').on('keydown', function(){
			$('#PasswordMessage').hide();
			$('#PasswordMessage').parent().css('margin', '0');
		});

    $('#New_password').on('keyup', function(){
      CurrentPassword = $('#Cpassword').val();
			if($(this).val().length <= 7){
				$('#checkPasswordMessage').html("8 characters minimum").show();
				$( "#New_password" ).focus();
				$("#New_password").addClass('focuscss');
				$(".change-password-button").addClass("stop");				
      }
      else if ($(this).val().length > 7 && $(this).val() == CurrentPassword) {
        $('#checkPasswordMessage').html("The new password cannot be same as the current password").show();
        $( "#New_password" ).focus();
        $("#New_password").addClass('focuscss');
        $(".change-password-button").addClass("stop"); 
      }
			else{
        $('#checkPasswordMessage').hide();
				$("#New_password").removeClass('focuscss');
				$(".change-password-button").removeClass("stop");
			}					
    });

    $('#Confirm_password').on('keyup', function(){
        NewPassword = $('#New_password').val();
        if($(this).val() != NewPassword){
          $('#checkPasswordMessage').html("These passwords do not match").show();
          $( "#Confirm_password" ).focus();
          $("#Confirm_password").addClass('focuscss');
          $(".change-password-button").addClass("stop");                            
        }
        else{
          $('#checkPasswordMessage').hide();
          $("#Confirm_password").removeClass('focuscss');
          $(".change-password-button").removeClass("stop");
        }                    
    });
  });     
</script>
<!-- END WRONG CURRENT PASSWORD -->

<?php	else: ?>

    <!-- UPDATE PASSWORD SUCCESSFUL  -->
	<div class="flex-container" id="non-member">
		<div class="flex-cell">
			<h3 class="light-lead-heading">Password updated successfully.</h3>
		</div>
		<div class="flex-cell cta">
			<a href="/dashboard" class="join">Go to Dashboard</a>
		</div>
		<div class="flex-cell pd-featured"><img src="/sites/default/files/pd-featured-images/next-18.5.png"></div>
	</div>
<?php endif; ?>

<?php	else: ?> 
<div id="pre_background" style="display:none">background_<?php echo $background;  ?></div>
<?php apa_function_dashboardLeftNavigation_form(); ?> 
<div class="col-xs-12 col-md-10 background_<?php echo $background; ?>" id="dashboard-right-content">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="col-xs-12"><span class="dashboard-name cairo"><strong>Change your password</strong></span></div>
         <!--<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>-->
      </div>
      <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">

  </div>
</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
		<form id="changePasswordForm" action="changepassword" method="POST">
		   <div class="changePassword">
			  <div class="row">
				 <div class="col-lg-6">
				 	<label>Current password</label>
					<input type="password" class="form-control" placeholder="Current password" id="Cpassword" value="" name="Password">
				 	<a href="/forget-password">Don't know your password?</a>
				 </div>
			  </div>
			  <div class="row">
				 <div class="col-lg-6">
				 	<label>New password</label>
					<input type="password" class="form-control" placeholder="New password" id="New_password" name="New_password">
				 </div>
			  </div>
			  <div class="row">
				 <div class="col-lg-6">
				 	<label>Confirm new password</label>
					<input type="password" class="form-control" placeholder="Confirm password" id="Confirm_password" name="Confirm_password">
				 </div>
        </div>
        <div class="row">
				 <div class="col-lg-6">
           <span id="checkPasswordMessage" style="display: none"></span>
				 </div>
        </div>
        <div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   <button  class="accent-btn change-password-button"><span class="dashboard-button-name">Save</span></button></div>
        </div>
		   </div>
		</form>

				 </div>
				
      </div>
   </div>
</div>

<script>
  jQuery(document).ready(function(){

    $('#New_password').on('keyup', function(){
      CurrentPassword = $('#Cpassword').val();
			if($(this).val().length <= 7){
				$('#checkPasswordMessage').html("8 characters minimum").show();
				$( "#New_password" ).focus();
				$("#New_password").addClass('focuscss');
				$(".change-password-button").addClass("stop");				
      }
      else if ($(this).val().length > 7 && $(this).val() == CurrentPassword) {
        $('#checkPasswordMessage').html("The new password cannot be same as the current password").show();
        $( "#New_password" ).focus();
        $("#New_password").addClass('focuscss');
        $(".change-password-button").addClass("stop"); 
      }
			else{
        $('#checkPasswordMessage').hide();
				$("#New_password").removeClass('focuscss');
				$(".change-password-button").removeClass("stop");
			}					
    });

    $('#Confirm_password').on('keyup', function(){
        NewPassword = $('#New_password').val();
        if($(this).val() != NewPassword){
          $('#checkPasswordMessage').html("These passwords do not match").show();
          $( "#Confirm_password" ).focus();
          $("#Confirm_password").addClass('focuscss');
          $(".change-password-button").addClass("stop");                            
        }
        else{
          $('#checkPasswordMessage').hide();
          $("#Confirm_password").removeClass('focuscss');
          $(".change-password-button").removeClass("stop");
        }                    
    });
  });     
</script>
<?php endif; ?>
<?php 	else: ?>
		<!-- USER NOT LOGIN  -->
		<div class="flex-container" id="non-member">
			<div class="flex-cell">
				<h3 class="light-lead-heading">Please login to see this page.</h3>
			</div>
			<div class="flex-cell cta">
				<a data-target="#loginAT" data-toggle="modal" href="#" class="login">Login</a>
				<a href="/membership-question" class="join">Join now</a>
			</div>
			<div class="flex-cell pd-featured"><img src="/sites/default/files/pd-featured-images/next-18.5.png"></div>
		</div>
<?php endif; ?>
<?php logRecorder(); ?>