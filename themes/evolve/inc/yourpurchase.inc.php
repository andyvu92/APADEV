<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
$products_json= '{ 
"Product_1":{
  "Name":"ProductA",
   "Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
   "Price":"8.88",
   "Date":"12/12/2014"},
 "Product_2":{
  "Name":"ProductB",
   "Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
   "Price":"9.99",
   "Date":"12/05/2017"},
"Product_3":{
  "Name":"ProductC",
   "Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
   "Price":"7.77",
   "Date":"12/12/2016"},
"Product_4":{
  "Name":"ProductD",
   "Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
   "Price":"7.77",
   "Date":"12/12/2016"},
"Product_5":{
  "Name":"ProductE",
   "Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
   "Price":"7.77",
   "Date":"12/12/2016"},
"Product_6":{
  "Name":"ProductF",
   "Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
   "Price":"7.77",
   "Date":"12/12/2016"},
"Product_7":{
  "Name":"ProductG",
   "Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
   "Price":"7.77",
   "Date":"12/12/2016"},
"Product_8":{
  "Name":"ProductH",
   "Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
   "Price":"7.77",
   "Date":"12/12/2016"}
}';
$products= json_decode($products_json, true);
rsort($products);

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
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Your purchases</strong></span></div>

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
       <form name="formradio" action="your-purchases" method="POST"">
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


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
<p><a class="event4" style="cursor: pointer;"><span class="text-underline" id="recent-purchases" style="margin-left:1%;"><strong>Recent purchases</strong></span> </a><a class="event5" style="cursor: pointer; margin-left:10px;"><span id="all-purchases"><strong>See all purchases</strong></span></a></p>
<div class="down4">
<table class="table table-responsive">
	<tbody>
         <tr>
             <td>Prodcut Name</td>
             <td>Download Invoice</td>
              <td>Price</td>
              <td>Date</td>
        </tr>
	<?php foreach($products as $product){
               $now = date('d-m-Y');
                
               if(strtotime($now)<strtotime('+2 years',strtotime($product['Date']))){
		echo "<tr>";
                   
		echo	"<td>".$product['Name']."</td>";
                echo	'<td><a style="color:white;" href="' .$product['Invoice'].'">Invoice</a></td>';
                echo	"<td>".$product['Price']."</td>";
                echo	"<td>".$product['Date']."</td>";
		
                 echo "</tr>";
              }
             }
	?>	
	</tbody>
</table>
</div>
<div class="down5"   style="display: none;">
<table class="table table-responsive">
	<tbody>
          <tr>
             <td>Prodcut Name</td>
             <td>Download Invoice</td>
              <td>Price</td>
              <td>Date</td>
        </tr>
	<?php foreach($products as $product){
             
                
            
		echo "<tr>";
                   
		echo	"<td>".$product['Name']."</td>";
                echo	'<td><a style="color:white;" href="' .$product['Invoice'].'">Invoice</a></td>';
                echo	"<td>".$product['Price']."</td>";
                echo	"<td>".$product['Date']."</td>";
		
                 echo "</tr>";
           
             }
	?>	
	</tbody>
</table>
</div>

</div>



</div>
</div>
</div>
 