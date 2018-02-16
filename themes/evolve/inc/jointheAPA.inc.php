
<?php
 include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
        
   ?>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Become a member</strong></span></div>
         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background <?php if(!isset($_SESSION["userID"])) echo "display-none";?>">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
      </div>
      <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please select background image</h4>
      </div>
      <div class="modal-body">
       <form name="formradio" action="your-details" method="POST"">
      <input type="hidden" name="userID" value="<?php echo $userID; ?>"> 
      <input type="hidden" name="update">  
      <label> <input type="radio" name="background" value="1" id="background1"><img src="../sites/default/files/PARALLAX_TRADIES.jpg"></label>
      <label> <input type="radio" name="background" value="2"  id="background2"><img src="../sites/default/files/ABOUT%20US/ABOUTUS1170X600.jpg"></label>
      <label> <input type="radio" name="background" value="3"  id="background3"><img src="../sites/default/files/NG_1200X600_RURAL.png"></label>
      <label> <input type="radio" name="background" value="4"  id="background4"><img src="../sites/default/files/MEDIA1170X600_5.jpg"></label>
      
      </div>
      <div class="modal-footer">
      
        <button type="Submit" class="btn btn-default" id="background_save">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>

  </div>
</div>
      <script type="text/javascript">
         function changeStatus(number){
               document.formradio.background[number].checked=true;
                   }
         
         function myFunction() {
             var background_number =document.formradio.background.value;
             var pre_bg =  document.getElementById('pre_background').innerHTML;
             document.getElementById("dashboard-right-content").classList.remove(pre_bg);
             var cur_bg = 'background_' +background_number;
             document.getElementById("dashboard-right-content").classList.add(cur_bg);
             document.getElementById('pre_background').innerHTML = 'background_' + background_number; 
         }
      </script>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <ul class="nav nav-tabs">
               <li><a class="tabtitle1 inactiveLink" style="cursor: pointer;"><span class="<?php if(!isset($_POST['step1']) && !isset($_POST['step2']))echo "text-underline";?> eventtitle1" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
           
               <li><a class="tabtitle2 inactiveLink" style="cursor: pointer;"><span class="eventtitle2" id="membership"><strong>Membership</strong></span></a></li>
               
               <li><a class="tabtitle3 inactiveLink" style="cursor: pointer;"><span class="eventtitle3" id="workplace"><strong>Workplace</strong></span></a></li>
               <li><a class="tabtitle4 inactiveLink" style="cursor: pointer;"><span class="eventtitle4" id="education"><strong>Education</strong></span></a></li>
               <li><a class="tabtitle5 inactiveLink" style="cursor: pointer;"><span class="eventtitle5 <?php if(isset($_POST['step1']))echo 'text-underline';?>" id="payment"><strong>Insurance</strong></span></a></li>
			   <li><a class="tabtitle6 inactiveLink" style="cursor: pointer;"><span class="eventtitle6" id="payment"><strong>Survey</strong></span></a></li>
			   <li><a class="tabtitle7 inactiveLink" style="cursor: pointer;"><span class="eventtitle7" id="payment"><strong>Payment</strong></span></a></li>
			   <li><a class="tabtitle8 inactiveLink" style="cursor: pointer;"><span class="eventtitle8" id="payment"><strong>Review</strong></span></a></li>
			</ul>
   
   <?php
 include('sites/all/themes/evolve/inc/jointheAPA/jointheAPA-yourdetail.inc.php');
 if(isset($_POST["step1"]) && $_POST["step1"] == "1") {
	include('sites/all/themes/evolve/inc/jointheAPA/jointheAPA-insurancesurvey.inc.php'); 
 } elseif(isset($_POST["step2"]) && $_POST["step2"] == "2") {
	include('sites/all/themes/evolve/inc/jointheAPA/jointheAPA-final.inc.php');
 }
  ?>
  
      </div>
   </div>
</div>
</div>
 <div id="privacypolicyWindow" style="display:none;">
							<h3>APA privacy policy</h3>
							 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
							 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pretium
tellus non ex mattis feugiat a in est. Praesent est leo, viverra ac
hendrerit ac, facilisis at ante. Phasellus elementum hendrerit risus,
eu luctus dolor sollicitudin vitae. Cras ac tellus ut mauris scelerisque
mollis. Sed nibh ipsum, fringilla sed pellentesque non, luctus ut diam.
In viverra neque lacus, vel pulvinar nulla convallis id. Curabitur porttitor
eleifend quam in tincidunt.
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
							 <label for="privacypolicyp">Yes. I’ve read and understand the APA privacy policy</label><input type="checkbox" id="privacypolicyp">
                           </div>
						 
</div>
<div id="installmentpolicyWindow" style="display:none;">
							<h3>APA installment policy</h3>
							 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
							 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pretium
tellus non ex mattis feugiat a in est. Praesent est leo, viverra ac
hendrerit ac, facilisis at ante. Phasellus elementum hendrerit risus,
eu luctus dolor sollicitudin vitae. Cras ac tellus ut mauris scelerisque
mollis. Sed nibh ipsum, fringilla sed pellentesque non, luctus ut diam.
In viverra neque lacus, vel pulvinar nulla convallis id. Curabitur porttitor
eleifend quam in tincidunt.
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
							 <label for="installmentpolicyp">Yes. I’ve read and understand the APA installment policy</label><input type="checkbox" id="installmentpolicyp">
                           </div>
						 
</div>	
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">		
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
