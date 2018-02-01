<?php
global $base_url;
$json = '{"Name":"Melanie Tannin","Memberid":"Melanie.tannin@physiotherapy.asn.au","MemberType":"student","Status":"Current","Ahpranumber":"6934395685-1","Specialty":"FACP","Officebearer":"NAC Chair","CPD":"15"}';
$user= json_decode($json, true);
$names = explode(" ",$user['Name']);
$cpd = $user["CPD"];
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
?> 
<div id="cpd" style="display:none"><?php echo $cpd; ?></div>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    window.onresize = function(event) {
   google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
};
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
     function drawChart() {
        var fin =  Number(document.getElementById('cpd').innerHTML);
        var unfin = Number(20 - fin);
      
        var data = google.visualization.arrayToDataTable([
          ['CPD', 'Hours per Day'],
          ['Finished',     fin],
          ['Unfinished',  unfin],
       
        ]);
        if(window.innerWidth<361){
        
         var options = {
          chartArea:{left:0,top:0,width:'80%',height:'80%'},
         
          backgroundColor: 'transparent',
          pieSliceBorderColor: 'transparent',
          pieHole: 0.7,
          legend: 'none',
          pieSliceText: 'none',
          pieSliceTextStyle: {
            color: 'white',
          },
         slices: {
            0: { color: '#009fda' },
            1: { color: 'grey' }
          },
        
          
        };

       }
       else{
        var options = {
          chartArea:{left:0,top:0,width:'150%',height:'150%'},
         
          backgroundColor: 'transparent',
          pieSliceBorderColor: 'transparent',
          pieHole: 0.75,
          legend: 'none',
          pieSliceText: 'none',
          pieSliceTextStyle: {
            color: 'white',
          },
         slices: {
            0: { color: '#009fda' },
            1: { color: 'grey' }
          },
        
          
        };

       }
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

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
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Hello <?php echo $names[0]; ?></strong></span></div><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-toggle="modal" data-target="#myModal"><span class="customise_background" >Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div></div>
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
       <form name="formradio" action="dashboard" method="POST">
      <input type="hidden" name="userID" value="<?php echo $userID; ?>"> 
      <input type="hidden" name="update">  
	  <label> <input type="radio" name="background" value="1" id="background1"><img src="../sites/default/files/DASHBOARD_PIC_1170X600.jpg"></label>
      <label> <input type="radio" name="background" value="2"  id="background2"><img src="../sites/default/files/DASHBOARD_PIC_1170X600_2.jpg"></label>
      <label> <input type="radio" name="background" value="3"  id="background3"><img src="../sites/default/files/DASHBOARD_PIC_1170X600_3.jpg"></label>
      <label> <input type="radio" name="background" value="4"  id="background4"><img src="../sites/default/files/DASHBOARD_PIC_1170X600_4.jpg"></label>
	  <label> <input type="radio" name="background" value="5"  id="background4"><img src="../sites/default/files/DASHBOARD_PIC_1170X600_5.jpg"></label>
       
         
      </div>
      <div class="modal-footer">
      
        <button  type="Submit" class="btn btn-default" id="background_save">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>

  </div>
</div>
  
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mobile_line" >
 
           <table class="table table-responsive bordless">
               <tbody style="border-top: none;">
                   <tr>
                      <td><span style="text-decoration: underline; color:#009fda"><strong>Your details</strong></span></td>
                   </tr>
                   <tr>
                       <td><strong>Name:</strong></td>
                       <td><?php echo $user['Name']; ?></td>
                     </tr>
                    <tr>
                       <td><strong>Member ID:</strong></td>
                       <td><?php echo $user['Memberid']; ?></td>
                     </tr>
                     <tr>
                       <td><strong>Member type:</strong></td>
                       <td><?php echo $user['MemberType']; ?></td>
                     </tr>
                     <tr>
                       <td><strong>Status:</strong></td>
                       <td><?php echo $user['Status']; ?></td>
                     </tr>
                    <tr>
                       <td><strong>AHPRA NO:</strong></td>
                       <td><?php echo $user['Ahpranumber']; ?></td>
                     </tr>
                     <tr>
                       <td><strong>Specialty:</strong></td>
                       <td><?php echo $user['Specialty']; ?></td>
                     </tr>
                     <tr>
                       <td><strong>Officebearer positions:</strong></td>
                       <td><?php echo $user['Officebearer']; ?></td>
                     </tr>
                       <tr>
                       <td></td>
                       <td><a href=""><strong><span style="text-decoration: underline; color:white;">Membership certificate of currency</span></strong></a></td>
                     </tr>
                       <tr>
                       <td></td>
                       <td><a href=""><strong><span style="text-decoration: underline; color:white">Insurance certificate of currency</span></strong></a></td>
                     </tr>
                 </tbody>
           </table>
    
      </div>   
       
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mobile_line" >
        
             <table class="table table-responsive">
               <tbody style="border-top: none;">
                   <tr>
                      <td><strong>Years of membership</strong></td>
                       <td><strong><span style="margin-left:15px;">CPD hours</span></strong></td>
                   </tr>
                    <tr>
                        <td><div class="circle">10</div></td>
                        <td><div class="circle"><?php echo $cpd; ?></div><div id="donutchart"></div></td>
                      
                   </tr>
                </tbody>
              </table>
           
      
    </div>
   </div>
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 mobile_line">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><strong>Your National Groups &gt</strong></div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-content-bottom">
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators 
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
-->
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
      
 <!-----edit----><?php 
	 nationalIcons();
?>


</div>

   

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button class="dashboard-button"><span class="dashboard-button-name">Join more &gt</span></button></div>
        </div>
         
           <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mobile_line">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><strong>Donate to the PRF &gt</strong></div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-content-bottom"><img src="/sites/default/files/PRF_155x56.png" alt=""></div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button  class="dashboard-button dashboard-bottom-button "><span class="dashboard-button-name">Donate today &gt</span></button></div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><strong>Suggestions/feedback &gt</strong></div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-content-bottom">If you have a question or concern, please don’t hesitate to contact us. We’re always looking for ways to improve our member offering.</div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button class="dashboard-button dashboard-bottom-button"><span class="dashboard-button-name">Submit &gt</span></button></div>
        </div>
        
    </div>
 </div>
</div>

