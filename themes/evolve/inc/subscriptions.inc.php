<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
$subscriptions_json= '{ 
  "Online-learning":"1",
   "Continence":"1",
   "Conference":"1",
   "Educators":"1",
   "Market-campaign":"1",
   "Emergency":"1",
   "Jobs-4-physio":"1",
   "Gerontology":"1",
    "Advocacy":"1",
   "Leadership":"1",
   "National-office":"1",
   "Musculoskeletal":"1",
   "Journal-of-physiotherapy":"1",
   "Neurology":"1",
   "Inmotion-online":"1",
   "Occupational":"1",
   "Flagship":"1",
   "Orthopaedic":"1",
   "Professinal-development":"1",
   "Paediatric":"1",
   "Students":"1",
   "Pain":"1",
   "Acupuncture":"0",
   "Sports":"1",
   "Animal":"1",
   "Rural":"1",
   "Aquatic":"1",
   "Print":"1",
   "Business":"1",
   "Disability":"1",
   "Cancer":"1",
   "Mental":"1",
   "Cardiorespiratory":"1",
   "Mental":"1"
}';
$subscriptions= json_decode($subscriptions_json, true);


?>


<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<div style="display:table;">
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 dashboard-left-nav">
    <a type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dashboard-navbar-collapse-1"><i class="fa fa-align-justify"></i></a>
 <!----edit-->
<div class="collapse" id="dashboard-navbar-collapse-1">
  <table class="table table-responsive">
               <tbody style="border-top: none;">
                   <tr>
                      <td><a href="dashboard"><div class="dashboard-icon">[icon class="fa fa-tachometer fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Dashboard</div></a></td>
                       <td> <a href="your-details"><div class="dashboard-icon">[icon class="fa fa-users fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Your details</div></a></td>
                       
                   </tr>
                    <tr>
                        <td><a href="your-purchases"><div class="dashboard-icon">[icon class="fa fa-shopping-cart fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Purchases</div></a></td>
                        <td><a href="subscriptions"><div class="dashboard-icon">[icon class="fa fa-trophy fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Subscriptions</div></a></td>
                        <td><a href="#about"><div class="dashboard-icon">[icon class="fa fa-folder-open fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Renew</div></a></td>
                      
                   </tr>
                </tbody>
              </table>
  
    
  


</div>
<!---end--->
<div class="navbar-collapse collapse">
  <ul class="nav navbar-nav navbar-left">
      <li class="dashboard-nav"><a href="dashboard"><div class="dashboard-icon">[icon class="fa fa-tachometer fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Dashboard</div></a></li>
      <li class="dashboard-nav"><a href="your-details"><div class="dashboard-icon">[icon class="fa fa-users fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Your details</div></a></li>
      <li class="dashboard-nav"><a href="your-purchases"><div class="dashboard-icon">[icon class="fa fa-shopping-cart fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Purchases</div></a></li>
      <li class="dashboard-nav"><a href="subscriptions"><div class="dashboard-icon">[icon class="fa fa-trophy fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Subscriptions</div></a></li>
      <li class="dashboard-nav"><a href="#about"><div class="dashboard-icon">[icon class="fa fa-folder-open fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Renew</div></a></li>
   
  </ul>
</div>
 </div >

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Your subscriptions</strong></span></div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
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
       <form name="formradio" action="subscriptions" method="POST"">
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
}</script>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
<p><span style="text-decoration: underline; color:#009fda; margin-left:1%;"><strong>What I'm signed up for</strong></span></p>
<form action="">
<table class="table table-responsive table-bordered">
	<tbody>
	
		<tr>
                   
			<td><label for="Online-learning">Online learning</label><input type="checkbox" name="Online-learning" id="Online-learning" value="<?php  echo $subscriptions['Online-learning'];?>" <?php if($subscriptions['Online-learning']==1){echo "checked";} ?>></td>
			<td><label for="Continence">Continence and Women's Health</label><input type="checkbox" name="Continence" id="Continence" value="<?php if(array_key_exists('Continence', $subscriptions)){echo $subscriptions['Continence'];} ?>"<?php if(!array_key_exists('Continence', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Continence', $subscriptions)){ if($subscriptions['Continence']==1){echo "checked";} }?>></td>
		</tr>
		<tr>
			<td><label for="Conference">Conference</label><input type="checkbox" name="Conference" id="Conference" value="<?php  echo $subscriptions['Conference'];?>" <?php if($subscriptions['Conference']==1){echo "checked";} ?>></td>
			<td><label for="Educators">Educators</label><input type="checkbox" name="Educators" id="Educators" value="<?php if(array_key_exists('Educators', $subscriptions)){echo $subscriptions['Educators'];} ?>"<?php if(!array_key_exists('Educators', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Educators', $subscriptions)){ if($subscriptions['Educators']==1){echo "checked";} }?>></td>
		</tr>
		<tr>
			<td><label for="Market-campaign">Marketing campaign</label><input type="checkbox" name="Market-campaign" id="Market-campaign" value="<?php  echo $subscriptions['Market-campaign'];?>" <?php if($subscriptions['Market-campaign']==1){echo "checked";} ?>></td>
			<td><label for="Emergency">Emergency</label><input type="checkbox" name="Emergency" id="Emergency" value="<?php if(array_key_exists('Emergency', $subscriptions)){echo $subscriptions['Emergency'];} ?>"<?php if(!array_key_exists('Emergency', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Emergency', $subscriptions)){ if($subscriptions['Emergency']==1){echo "checked";} }?>></td>
		</tr>
		<tr>
			<td><label for="Jobs-4-physio">Jobs4Physio</label><input type="checkbox" name="Jobs-4-physio" id="Jobs-4-physio" value="<?php  echo $subscriptions['Jobs-4-physio'];?>" <?php if($subscriptions['Jobs-4-physio']==1){echo "checked";} ?>></td>
			<td><label for="Gerontology">Gerontology</label><input type="checkbox" name="Gerontology" id="Gerontology" value="<?php if(array_key_exists('Gerontology', $subscriptions)){echo $subscriptions['Gerontology'];} ?>"<?php if(!array_key_exists('Gerontology', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Gerontology', $subscriptions)){ if($subscriptions['Gerontology']==1){echo "checked";} }?>></td>
		</tr>
		<tr>
			<td><label for="Advocacy">Advocacy</label><input type="checkbox" name="Advocacy" id="Advocacy" value="<?php  echo $subscriptions['Advocacy'];?>" <?php if($subscriptions['Advocacy']==1){echo "checked";} ?>></td>
			<td><label for="Leadership">Leadership</label><input type="checkbox" name="Leadership" id="Leadership" value="<?php if(array_key_exists('Leadership', $subscriptions)){echo $subscriptions['Leadership'];} ?>"<?php if(!array_key_exists('Leadership', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Leadership', $subscriptions)){ if($subscriptions['Leadership']==1){echo "checked";} }?>></td>
		</tr>
		<tr>
			<td><label for="National-office">National Office</label><input type="checkbox" name="National-office" id="National-office" value="<?php  echo $subscriptions['National-office'];?>" <?php if($subscriptions['National-office']==1){echo "checked";} ?>></td>
			<td><label for="Musculoskeletal">Musculoskeletal</label><input type="checkbox" name="Musculoskeletal" id="Musculoskeletal" value="<?php if(array_key_exists('Musculoskeletal', $subscriptions)){echo $subscriptions['Musculoskeletal'];} ?>"<?php if(!array_key_exists('Musculoskeletal', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Musculoskeletal', $subscriptions)){ if($subscriptions['Musculoskeletal']==1){echo "checked";} }?>></td>
		</tr>
		<tr>
			<td><label for="Journal-of-physiotherapy">Journal of Physiotherapy</label><input type="checkbox" name="Journal-of-physiotherapy" id="Journal-of-physiotherapy" value="<?php  echo $subscriptions['Journal-of-physiotherapy'];?>" <?php if($subscriptions['Journal-of-physiotherapy']==1){echo "checked";} ?>></td>
			<td><label for="Neurology">Neurology</label><input type="checkbox" name="Neurology" id="Neurology" value="<?php if(array_key_exists('Neurology', $subscriptions)){echo $subscriptions['Neurology'];} ?>"<?php if(!array_key_exists('Neurology', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Neurology', $subscriptions)){ if($subscriptions['Neurology']==1){echo "checked";} }?>></td>
		</tr>
                <tr>
			<td><label for="Inmotion-online">InMotion Online</label><input type="checkbox" name="Inmotion-online" id="Inmotion-online" value="<?php  echo $subscriptions['Inmotion-online'];?>" <?php if($subscriptions['Inmotion-online']==1){echo "checked";} ?>></td>
			<td><label for="Occupational">Occupational</label><input type="checkbox" name="Occupational" id="Occupational" value="<?php if(array_key_exists('Occupational', $subscriptions)){echo $subscriptions['Occupational'];} ?>"<?php if(!array_key_exists('Occupational', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Occupational', $subscriptions)){ if($subscriptions['Occupational']==1){echo "checked";} }?>></td>
		</tr>
                <tr>
			<td><label for="Flagship">Flagship</label><input type="checkbox" name="Flagship" id="Flagship" value="<?php  echo $subscriptions['Flagship'];?>" <?php if($subscriptions['Flagship']==1){echo "checked";} ?>></td>
			<td><label for="Orthopaedic">Orthopaedic</label><input type="checkbox" name="Orthopaedic" id="Orthopaedic" value="<?php if(array_key_exists('Orthopaedic', $subscriptions)){echo $subscriptions['Orthopaedic'];} ?>"<?php if(!array_key_exists('Orthopaedic', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Orthopaedic', $subscriptions)){ if($subscriptions['Orthopaedic']==1){echo "checked";} }?>></td>
		</tr>
		 <tr>
			<td><label for="Professinal-development">Professional Development</label><input type="checkbox" name="Professinal-development" id="Professinal-development" value="<?php  echo $subscriptions['Professinal-development'];?>" <?php if($subscriptions['Professinal-development']==1){echo "checked";} ?>></td>
			<td><label for="Paediatric">Paediatric</label><input type="checkbox" name="Paediatric" id="Paediatric" value="<?php if(array_key_exists('Paediatric', $subscriptions)){echo $subscriptions['Paediatric'];} ?>"<?php if(!array_key_exists('Paediatric', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Paediatric', $subscriptions)){ if($subscriptions['Paediatric']==1){echo "checked";} }?>></td>
		</tr>
                 <tr>
			<td><label for="Students">Students</label><input type="checkbox" name="Students" id="Students" value="<?php  echo $subscriptions['Students'];?>" <?php if($subscriptions['Students']==1){echo "checked";} ?>></td>
			<td><label for="Pain">Pain</label><input type="checkbox" name="Pain" id="Pain" value="<?php if(array_key_exists('Pain', $subscriptions)){echo $subscriptions['Pain'];} ?>"<?php if(!array_key_exists('Pain', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Pain', $subscriptions)){ if($subscriptions['Pain']==1){echo "checked";} }?>></td>
		</tr>
                 <tr>
			<td><label for="Acupuncture">Acupuncture</label><input type="checkbox" name="Acupuncture" id="Acupuncture" value="<?php if(array_key_exists('Acupuncture', $subscriptions)){echo $subscriptions['Acupuncture'];} ?>"<?php if(!array_key_exists('Acupuncture', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Acupuncture', $subscriptions)){ if($subscriptions['Acupuncture']==1){echo "checked";} }?>></td>
			<td><label for="Sports">Sports</label><input type="checkbox" name="Sports" id="Sports" value="<?php if(array_key_exists('Sports', $subscriptions)){echo $subscriptions['Sports'];} ?>"<?php if(!array_key_exists('Sports', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Sports', $subscriptions)){ if($subscriptions['Sports']==1){echo "checked";} }?>></td>
		</tr>
                  <tr>
			<td><label for="Animal">Animal</label><input type="checkbox" name="Animal" id="Animal" value="<?php if(array_key_exists('Animal', $subscriptions)){echo $subscriptions['Animal'];} ?>"<?php if(!array_key_exists('Animal', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Animal', $subscriptions)){ if($subscriptions['Animal']==1){echo "checked";} }?>></td>
			<td><label for="Rural">Rural</label><input type="checkbox" name="Rural" id="Rural" value="<?php if(array_key_exists('Rural', $subscriptions)){echo $subscriptions['Rural'];} ?>"<?php if(!array_key_exists('Rural', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Rural', $subscriptions)){ if($subscriptions['Rural']==1){echo "checked";} }?>></td>
		</tr>
                 <tr>
			<td><label for="Aquatic">Aquatic</label><input type="checkbox" name="Aquatic" id="Aquatic" value="<?php if(array_key_exists('Aquatic', $subscriptions)){echo $subscriptions['Aquatic'];} ?>"<?php if(!array_key_exists('Aquatic', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Aquatic', $subscriptions)){ if($subscriptions['Aquatic']==1){echo "checked";} }?>></td>
			<td><label for="Disability">Disability</label><input type="checkbox" name="Disability" id="Disability" value="<?php if(array_key_exists('Disability', $subscriptions)){echo $subscriptions['Disability'];} ?>"<?php if(!array_key_exists('Disability', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Disability', $subscriptions)){ if($subscriptions['Disability']==1){echo "checked";} }?>></td>
		</tr>
                 <tr>
			<td><label for="Business">Business</label><input type="checkbox" name="Business" id="Business" value="<?php if(array_key_exists('Business', $subscriptions)){echo $subscriptions['Business'];} ?>"<?php if(!array_key_exists('Business', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Business', $subscriptions)){ if($subscriptions['Business']==1){echo "checked";} }?>></td>
			<td><label for="Mental">Mental Health</label><input type="checkbox" name="Mental" id="Mental" value="<?php if(array_key_exists('Mental', $subscriptions)){echo $subscriptions['Mental'];} ?>"<?php if(!array_key_exists('Mental', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Mental', $subscriptions)){ if($subscriptions['Mental']==1){echo "checked";} }?>></td>
		</tr>
                 <tr>
			<td><label for="Cancer">Cancer</label><input type="checkbox" name="Cancer" id="Cancer" value="<?php if(array_key_exists('Cancer', $subscriptions)){echo $subscriptions['Cancer'];} ?>"<?php if(!array_key_exists('Cancer', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Cancer', $subscriptions)){ if($subscriptions['Cancer']==1){echo "checked";} }?>></td>
			<td><label for="Print">Print copy of InMotion(note students can't receive the print copy)</label><input type="checkbox" name="Print" id="Print" value="<?php  echo $subscriptions['Print'];?>" <?php if($subscriptions['Print']==1){echo "checked";} ?>></td>
		</tr>
                  <tr>
			<td><label for="Cardiorespiratory">Cardiorespiratory</label><input type="checkbox" name="Cardiorespiratory"  id="Cardiorespiratory" value="<?php if(array_key_exists('Cardiorespiratory', $subscriptions)){echo $subscriptions['Cardiorespiratory'];} ?>"<?php if(!array_key_exists('Cardiorespiratory', $subscriptions)){echo "disabled ";} ?><?php if(array_key_exists('Cardiorespiratory', $subscriptions)){ if($subscriptions['Cardiorespiratory']==1){echo "checked";} }?>></td>
			<td><label for=""></label><input type="checkbox" name="" id="" value="" ></td>
		</tr>
	</tbody>
</table>
  <button  class="dashboard-button dashboard-bottom-button subscriptions-submit"><span class="dashboard-button-name">Submit</span></button>
</form>
</div>



</div>
</div>
</div>
 