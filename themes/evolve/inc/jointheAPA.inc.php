<?php
 include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
        
   ?>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<div style="display:table;">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Become a member</strong></span></div>
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
               <li><a class="event6" style="cursor: pointer;"><span class="text-underline eventtitle6" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
           
               <li><a class="event8" style="cursor: pointer;"><span class="eventtitle8" id="membership"><strong>Membership</strong></span></a></li>
               <li><a class="event9" style="cursor: pointer;"><span class="eventtitle9" id="payment"><strong>Shipping & Billing Address</strong></span></a></li>
               <li><a class="event10" style="cursor: pointer;"><span class="eventtitle10" id="workplace"><strong>Workplace</strong></span></a></li>
               <li><a class="event11" style="cursor: pointer;"><span class="eventtitle11" id="education"><strong>Education</strong></span></a></li>
            </ul>
            <form action="" name="your-details" method="POST">
               <div class="down6">
                  <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 none-padding">
                     <div class="row">
                        <div class="col-lg-3">
                           <label for="prefix">Prefix</label>
                           <select class="form-control" id="Prefix" name="Prefix">
                              <option value="" disabled>Prefix</option>
                              <option value="Prof">Prof</option>
                              <option value="Dr">Dr</option>
                              <option value="Mr">Mr</option>
                              <option value="Mrs">Mrs</option>
                              <option value="Miss">Miss</option>
                              <option value="Ms">Ms</option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="">First/preferred name</label>
                           <input type="text" class="form-control"  name="Firstname">
                        </div>
                        <div class="col-lg-3">
                           <label for="">Middle name</label>
                           <input type="text" class="form-control" name="Middle-name">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           <label for="">Maiden name</label>
                           <input type="text" class="form-control" name="Maiden-name">
                        </div>
                        <div class="col-lg-6">
                           <label for="">Last name</label>
                           <input type="text" class="form-control" name="Lastname">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <label for="">Birth Date</label>
                           <input type="date" class="form-control" name="Birth">
                        </div>
                        <div class="col-lg-3 col-lg-offset-1">
                           <label for="">Gender</label>
                           <select class="form-control" id="Gender" name="Gender">
                              <option value="" disabled> Gender </option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="other">I’d prefer not to say</option>
                           </select>
                        </div>
                     </div>
					  <div class="row">
                        <div class="col-lg-6">
                           <label for="">Phone number</label>
                           <input type="text" class="form-control" name="Home-phone-number"   pattern="[0-9]{10}">
                        </div>
                        <div class="col-lg-6">
                           <label for="">Mobile number</label>
                           <input type="text" class="form-control" name="Mobile-number"  pattern="[0-9]{9}">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-9">
                           Aboriginal and Torres Strait Islander origin
                        </div>
                        <div class="col-lg-3">
                           <select class="form-control" id="Aboriginal" name="Aboriginal">
                              <option value="">No</option>
                              <option value="AB">Yes, Aboriginal </option>
                              <option value="TSI">Yes, Torres Strait Islander </option>
                              <option value="BOTH">Yes, both Aboriginal and Torres Strait Islander</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">Mailing address:</div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <label for="">Unit/house number</label>
                           <input type="text" class="form-control"  name="Unit">
                        </div>
                        <div class="col-lg-6 col-lg-offset-2">
                           <label for="">PO box</label>
                           <input type="text" class="form-control" name="Pobox">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <label for="">Street name</label>
                           <input type="text" class="form-control" name="Street">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <label for="">City or town</label>
                           <input type="text" class="form-control" name="Suburb">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-3">
                           <label for="">Postcode</label>
                           <input type="text" class="form-control" name="Postcode">
                        </div>
                        <div class="col-lg-3">
                           <label for="">State</label>
                           <select class="form-control" id="State" name="State">
                              <option value=""  disabled> State </option>
                              <option value="ACT"> ACT </option>
                              <option value="NSW"> NSW </option>
                              <option value="SA"> SA </option>
                              <option value="TAS"> TAS </option>
                              <option value="VIC"> VIC </option>
                              <option value="QLD"> QLD </option>
                              <option value="NT"> NT </option>
                              <option value="WA"> WA </option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="">Country</label>
                           <input type="text" class="form-control" name="Country">
                        </div>
                     </div>
                    
                  <div class="row">
				     <div class="col-lg-12"><label for="Shipping-address"><strong>Shipping address:(Sames as Billing address)</strong></label><input type="checkbox" id="Shipping-address" checked></div>
                     <div class="col-lg-2">
                        <label for="">Unit/house no.</label>
                        <input type="text" class="form-control" name="Shipping-unitno" id="Shipping-unitno">
                     </div>
                     <div class="col-lg-4">
                        <label for="">Street name</label>
                        <input type="text" class="form-control" name="Shipping-streetname" id="Shipping-streetname">
                     </div>
                     <div class="col-lg-4">
                        <label for="">City or town</label>
                        <input type="text" class="form-control" name="Shipping-city-town" id="Shipping-city-town">
                     </div>
                     <div class="col-lg-2">
                        <label for="">Postcode</label>
                        <input type="text" class="form-control" name="Shipping-postcode" id="Shipping-postcode">
                     </div>
                  </div>
                  <div class="row">
                  </div>
                  <div class="row">
                     <div class="col-lg-2">
                        <label for="">State</label>
                        <input type="text" class="form-control" name="Shipping-state" id="Shipping-state">
                     </div>
                     <div class="col-lg-4">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="Shipping-country" id="Shipping-country">
                     </div>
                  </div>
                    
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
                     <div class="row form-image">
                        <div class="col-lg-12">
                           Upload/change image
                        </div>
                     </div>
                                               
                  </div>
               </div>
               <div class="down8" style="display:none;" >
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">Member ID(Your email address)</label>
                        <input type="text" class="form-control" name="Memberid" >
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">Member Type</label>
                        <select class="form-control" id="MemberType" name="MemberType" disabled>
                           <option value="" disabled>memberType</option>
                           <option value="FPI">Full-time physiotherapist with insurance (more than 18 hours per week) </option>
                           <option value="FPN">Full-time physiotherapist no insurance (more than 18 hours per week) </option>
                           <option value="FEPI">Full-time Employed Public Sector Physiotherapist (more than 18 hours per week) with insurance</option>
                           <option value="FEPN">Full-time Employed Public Sector Physiotherapist (more than 18 hours per week) no insurance</option>
                           <option value="PPI">Part-time Physiotherapist (less than 18 hours per week) with insurance</option>
                           <option value="PPN">Part-time Physiotherapist (less than 18 hours per week) no insurance</option>
                           <option value="PEP">Part-time Employed Public Sector Physiotherapist (less than 18 hours per week) </option>
                           <option value="MPU">Maternity/Paternity/Unemployed (working for less than 6 months) </option>
                           <option value="OV">Overseas for more than 6 months (must hold current registration with AHPRA) </option>
                           <option value="PGS">Post Graduate study and working less than 18 hours per week </option>
                           <option value="NPP">Non-Practising Physiotherapist registered as NPP with PhysioBA</option>
                           <option value="AM">￼Associate Member (Australia) </option>
                           <option value="GFY">￼Graduate First Year </option>
                           <option value="GSY">￼Graduate Second Year</option>
                           <option value="GTY">￼Graduate Third Year</option>
                           <option value="GFOY">￼Graduate Fourth Year</option>
                           <option value="GFYE">Graduate First Year Employed Public Sector </option>
                           <option value="GSYE">Graduate Second Year Employed Public Sector</option>
                           <option value="GTYE">￼Graduate Third Year Employed Public Sector</option>
                           <option value="GFOYE">￼Graduate Fourth Year Employed Public Sector </option>
                           <option value="SY">￼Student Year 1 - 4</option>
                           <option value="PA">Physiotherapy Assistant</option>
                           <option value="AMO">Associate Member (Overseas)</option>
                           <option value="AS">￼Affiliate subscription</option>
                           <option value="RAN">Retired and not working in any paid capacity</option>
                           <option value="RW">Retired with 36 years membership and is over the age of 55 years (subject to office validation)</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-2">
                        <label for="">AHPRA number</label>
                        <input type="text" class="form-control" name="Ahpranumber">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <label for="">Your Regional group</label>
                        <input type="text" class="form-control" name="Regional-group">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">Status</label>
                        <input type="text" class="form-control" name="Status" readonly>
                     </div>
                  </div>
               </div>
               <div class="down9"  style="display:none;" >
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="radio" name="Payment-method" id="Paypal" value="Paypal" /><label for="Paypal"><strong>Paypal</strong></label>&nbsp;
                        <input type="radio" name="Payment-method" id="Creditcard" value="Creditcard" /><label for="Creditcard"><strong>Credit Card</strong></label>&nbsp;
                     </div>
                  </div>
                  <div class='row' id="card_type_display">
                     <div class="col-lg-2"><label for="">Card Type</label></div>
                     <div class="col-lg-4">
                        <select class="form-control" id="Cardtype" name="Cardtype">
                           <option value="" disabled>Card Type</option>
                           <option value="AE">American Express</option>
                           <option value="Visa">Visa</option>
                           <option value="Mastercard">Mastercard</option>
                        </select>
                     </div>
                     <div class="col-lg-2"> <label for="">Name on card</label></div>
                     <div class="col-lg-4">
                        <input type="text" class="form-control" name="Name-on-card">
                     </div>
                  </div>
                  <div class='row' id="cardno">
                     <div class="col-lg-4">
                        <label for="">Card Number</label>
                        <input type="text" class="form-control" name="Cardno">
                     </div>
                     <div class="col-lg-4">
                        <label for="">Expiry Date</label>
                        <input type="date" class="form-control" name="Expiry-date">
                     </div>
                     <div class="col-lg-4">
                        <label for="">CCV</label>
                        <input type="text" class="form-control" name="CCV">
                     </div>
                  </div>
                  <div class='row debit-type' id="card-account">
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="Bsbno">
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="Accountno">
                     </div>
                  </div>
                  <div class="row payment-line">
                     <div class="col-lg-12"><strong>Billing address:</strong></div>
                  </div>
                  <div class="row">
                     <div class="col-lg-2">
                        <label for="">Unit/house no.</label>
                        <input type="text" class="form-control" name="Billing-unitno" id="Billing-unitno">
                     </div>
                     <div class="col-lg-4">
                        <label for="">Street name</label>
                        <input type="text" class="form-control" name="Billing-streetname" id="Billing-streetname">
                     </div>
                     <div class="col-lg-4">
                        <label for="">City or town</label>
                        <input type="text" class="form-control" name="Billing-city-town" id="Billing-city-town">
                     </div>
                     <div class="col-lg-2">
                        <label for="">Postcode</label>
                        <input type="text" class="form-control" name="Billing-postcode" id="Billing-postcode">
                     </div>
                  </div>
                  <div class="row">
                  </div>
                  <div class="row">
                     <div class="col-lg-2">
                        <label for="">State</label>
                        <input type="text" class="form-control" name="Billing-state" id="Billing-state">
                     </div>
                     <div class="col-lg-4">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="Billing-country" id="Billing-country">
                     </div>
                  </div>
                  <div class="row payment-line">
                     <div class="col-lg-12"><label for="Shipping-address"><strong>Shipping address:(Sames as Billing address)</strong></label><input type="checkbox" id="Shipping-address"></div>
                  </div>
                  <div class="row">
                     <div class="col-lg-2">
                        <label for="">Unit/house no.</label>
                        <input type="text" class="form-control" name="Shipping-unitno" id="Shipping-unitno">
                     </div>
                     <div class="col-lg-4">
                        <label for="">Street name</label>
                        <input type="text" class="form-control" name="Shipping-streetname" id="Shipping-streetname">
                     </div>
                     <div class="col-lg-4">
                        <label for="">City or town</label>
                        <input type="text" class="form-control" name="Shipping-city-town" id="Shipping-city-town">
                     </div>
                     <div class="col-lg-2">
                        <label for="">Postcode</label>
                        <input type="text" class="form-control" name="Shipping-postcode" id="Shipping-postcode">
                     </div>
                  </div>
                  <div class="row">
                  </div>
                  <div class="row">
                     <div class="col-lg-2">
                        <label for="">State</label>
                        <input type="text" class="form-control" name="Shipping-state" id="Shipping-state">
                     </div>
                     <div class="col-lg-4">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="Shipping-country" id="Shipping-country">
                     </div>
                  </div>
               </div>
              
               <div id="wpnumber"><?php  $wpnumber =  3; echo  $wpnumber; ?></div>

                 <script type="text/javascript">
                  jQuery(document).ready(function($) {
                      $(".chosen-select").chosen({width: "100%"});
                      $('#workplace').click(function(){
                            $('#dashboard-right-content').addClass("autoscroll");
                 });
                      $('.event6').click(function(){
                            $('#dashboard-right-content').addClass("autoscroll");
                 });
                      $('.add-workplace').click(function(){
                    
                        
                       var number = Number($('#wpnumber').text());
                      
                         var i = Number(number +1);
                       
                       
			 $('div[class="down10"] #tabmenu').append( '<li id="workplaceli'+ i + '"><a data-toggle="tab" href="#workplace'+ i + '">Workplace'+ i+'</a><span class="deletewp'+ i + '" style=" float: right; color: red; margin-right: 55%;">x</span></li>' );
                         $('div[class="down10"]').append('<div id="workplace'+ i +'" class="tab-pane fade"></div>');
                         $('#wpnumber').text(i);
                         $("#workplace"+ i ).load("workplace.php", {"count":i});
                    
                         $(".chosen-select").chosen({width: "100%"});
                       
                         
                       
                
	          });
                     
                   $("a[href^=#workplace]").live( "click", function(){ $(".chosen-select").chosen({width: "100%"});});
                   $("[class^=deletewp]").live( "click", function(){
                          
                        
                          var x = $(this).attr("class").replace('deletewp', '');
                          $("#workplaceli"+ x).remove();
                          $("#workplace"+ x).remove();
                           $(".deletewp"+ x).remove();
                      });
                      
                });
               
                   
               </script>
               <div class="down10" style="display:none;">
                   <ul class="nav nav-tabs" id="tabmenu">
                  
                        <?php for( $i=0;$i<3;$i++ ):  ?>
                   
                        <li class ='<?php if($i==0) echo "active";?>'><a data-toggle="tab" href="#workplace<?php echo $i;?>"><?php echo "Workplace".$i;?></a></li>
               
                  <?php endfor; ?>   
                    </ul>
             
           
                <?php  for( $i=0;$i<3;$i++ ):  ?>
                <div id="workplace<?php echo $i;?>" class='tab-pane fade  <?php if($i==0) echo "in active";?> '>
                 
                 <div class="row"><div class="col-lg-6"></div><div class="col-lg-6"> <label for="Findphysio<?php echo $i;?>"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
                        <input type="checkbox" name="Findphysio" id="Findphysio<?php echo $i;?>" value="" ></div></div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="Name-of-workplace">Practice Name</label>
                        <input type="text" class="form-control" name="Name-of-workplace<?php echo $i;?>" id="Name-of-workplace<?php echo $i;?>">
                     </div>
                     <div class="col-lg-2">
                        <label for="Wunit<?php echo $i;?>">Unit/house number</label>
                        <input type="text" class="form-control" name="Wunit<?php echo $i;?>" id="wunit<?php echo $i;?>">
                     </div>
                     <div class="col-lg-4">
                        <label for="Wstreet<?php echo $i;?>">Street name</label>
                        <input type="text" class="form-control" name="Wstreet<?php echo $i;?>" id="Wstreet<?php echo $i;?>">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <label for="Wcity<?php echo $i;?>">City/Town</label>
                        <input type="text" class="form-control" name="Wcity<?php echo $i;?>" id="Wcity<?php echo $i;?>">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wpostcode<?php echo $i;?>">Postcode</label>
                        <input type="text" class="form-control" name="Wpostcode<?php echo $i;?>" id="Wpostcode<?php echo $i;?>">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wstate<?php echo $i;?>">State</label>
                        <input type="text" class="form-control" name="Wstate<?php echo $i;?>" id="Wstate<?php echo $i;?>">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wcountry<?php echo $i;?>">Country</label>
                        <input type="text" class="form-control" name="Wcountry<?php echo $i;?>" id="Wcountry<?php echo $i;?>">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="Wemail<?php echo $i;?>">Workplace email</label>
                        <input type="text" class="form-control" name="Wemail<?php echo $i;?>" id="Wemail<?php echo $i;?>">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wwebaddress<?php echo $i;?>">Website</label>
                        <input type="text" class="form-control" name="Wwebaddress<?php echo $i;?>" id="Wwebaddress<?php echo $i;?>">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wphone<?php echo $i;?>">Phone number</label>
                        <input type="text" class="form-control" name="Wphone<?php echo $i;?>" id="Wphone<?php echo $i;?>">
                     </div>
                  </div>
               
                         <div class="row">
                     <div class="col-lg-3">
                        Does this workplace offer additional languages?<br/>
                      
                     </div>
                     <div class="col-lg-3">
                        <select class="chosen-select" id="Additionallanguage<?php echo $i;?>" name="Additionallanguage<?php echo $i;?>" multiple  tabindex="-1" data-placeholder="Choose an additional language...">
                           <option value="NONE" disabled>no</option>
                           <option value="AF"> Afrikaans </option>
                           <option value="AR"> Arabic </option>
                           <option value="BO"> Bosnian </option>
                           <option value="CA"> Cantonese </option>
                           <option value="CHZ"> Chzech </option>
                           <option value="CR"> Croation </option>
                           <option value="DA"> Danish </option>
                           <option value="DU"> Dutch </option>
                           <option value="EG"> Egyptian </option>
                           <option value="ENG"> English </option>
                           <option value="FL"> Filipino </option>
                           <option value="FR"> French </option>
                           <option value="GE"> German </option>
                           <option value="GR"> Greek </option>
                           <option value="HE"> Hebrew </option>
                           <option value="HI"> Hindi </option>
                           <option value="HO"> Hokkien </option>
                           <option value="HU"> Hungarian </option>
                           <option value="IND"> Indonesian </option>
                           <option value="IT"> Italian </option>
                           <option value="JP"> Japanese </option>
                           <option value="KO"> Korean </option>
                           <option value="LAT"> Latvian </option>
                           <option value="LE"> Lebanese </option>
                           <option value="M"> Marathi </option>
                           <option value="MA"> Macedonian </option>
                           <option value="MALT"> Maltese </option>
                           <option value="MAN"> Mandarin </option>
                           <option value="MAV"> Mavathi </option>
                           <option value="ML"> Malay </option>
                           <option value="NOR"> Norwegian </option>
                           <option value="POL"> Polish </option>
                           <option value="POR"> Portuguese </option>
                           <option value="PU"> Punjabi </option>
                           <option value="RU"> Russian </option>
                           <option value="S"> Slovak </option>
                           <option value="SERB"> Serbian </option>
                           <option value="SL"> Sign Language </option>
                           <option value="SP"> Spanish </option>
                           <option value="SW"> Swedish </option>
                           <option value="SWI"> Swiss </option>
                           <option value="TA"> Tamil </option>
                           <option value="TAW"> Taiwanese </option>
                           <option value="TE"> Teo-Chew </option>
                           <option value="TEL"> Telugu </option>
                           <option value="TH"> Thai </option>
                           <option value="TURK"> Turkish </option>
                           <option value="UK"> Ukrainian </option>
                           <option value="UR"> Urdu </option>
                           <option value="VI"> Vietnamese </option>
                           <option value="YI"> Yiddish </option>
                           <option value="YU"> Yugoslav </option>
                        </select>
                     </div>
                     <div class="col-lg-3">
                        Quality In Practice number(QIP):
                     </div>
                      <div class="col-lg-3">
                         <input type="text" class="form-control" name="QIP<?php echo $i;?>" id="QIP<?php echo $i;?>">
                     </div>
                  </div>
                  <div class="row"> 
                    <div class="col-lg-3">
                        Does this workplace provide:
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                    <input type="checkbox" name="Electronic-claiming<?php echo $i;?>" id="Electronic-claiming<?php echo $i;?>" value=""> <label for="Electronic-claiming<?php echo $i;?>">Electronic claiming</label>
                   
                    </div>
                     <div class="col-lg-6">
                      <input type="checkbox" name="Hicaps<?php echo $i;?>" id="Hicaps<?php echo $i;?>" value=""> <label for="Hicaps<?php echo $i;?>">HICAPS</label>
                    </div>
                 
                 </div>
                  <div class="row">
                       <div class="col-lg-6">
                    <input type="checkbox" name="Healthpoint<?php echo $i;?>" id="Healthpoint<?php echo $i;?>" value="" > <label for="Healthpoint<?php echo $i;?>">Healthpoint</label>
                    </div>
                    <div class="col-lg-6">
                    <input type="checkbox" name="Departmentva<?php echo $i;?>" id="Departmentva<?php echo $i;?>" value=""> <label for="Departmentva<?php echo $i;?>">Department of Vetarans' Affairs</label>
                    </div>
                   </div>
                  <div class="row">
                     <div class="col-lg-6">
                      <input type="checkbox" name="Workerscompensation<?php echo $i;?>" id="Workerscompensation<?php echo $i;?>" value=""> <label for="Workerscompensation<?php echo $i;?>">Workers compensation</label>
                    </div>
                    <div class="col-lg-6">
                    <input type="checkbox" name="Motora<?php echo $i;?>" id="Motora<?php echo $i;?>" value=""> <label for="Motora<?php echo $i;?>">Motor accident compensation</label>
                    </div>
                   
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                    <input type="checkbox" name="Medicare<?php echo $i;?>" id="Medicare<?php echo $i;?>" value=""> <label for="Medicare<?php echo $i;?>">Medicare Chronic Disease Management</label>
                    </div>
                  </div>
                    <div class="row">
                     <div class="col-lg-3">
                        Workplace setting
                     </div>
                     <div class="col-lg-6">
                        <select class="form-control" id="Workplace-setting<?php echo $i;?>" name="Workplace-setting<?php echo $i;?>">
                           <option value="NONE"disabled>no</option>
                           <option value="AHS"> Aboriginal health services </option>
                           <option value="DF"> Defence forces</option>
                           <option value="DS"> Domiciliary services</option>
                           <option value="EF"> Education facility</option>
                           <option value="GPP"> Group private practice</option>
                           <option value="H"> Hospital(exclude outpatient)</option>
                           <option value="LPP"> Locum private practice</option>
                           <option value="O"> Other</option>
                           <option value="OCB"> Other commercial/business services</option>
                           <option value="OCH"> Other community health care services</option>
                           <option value="OGD"> Other government department or agency</option>
                           <option value="ORC"> Other residential care facility</option>
                           <option value="OS"> Outpatient services </option>
                           <option value="RD"> Rehabilitation/physical development services</option>
                           <option value="RA"> Residential age care facility </option>
                           <option value="SPP"> Sole private practice</option>
                           <option value="SCC"> Sports centre/clinic</option>
                        </select>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-3">
                        Numbers of hours worked
                     </div>
                     <div class="col-lg-6">
                        <select class="form-control" id="Number-worked-hours<?php echo $i;?>" name="Number-worked-hours<?php echo $i;?>">
                           <option value="0" disabled>no</option>
                           <option value="1"> 1-4 </option>
                           <option value="2"> 5-8</option>
                           <option value="3"> 9-12</option>
                           <option value="4"> 13-16</option>
                           <option value="5"> 17-20</option>
                           <option value="6"> 21-25</option>
                           <option value="7"> 26-30</option>
                           <option value="8"> 31-35</option>
                           <option value="9"> 36-40</option>
                           <option value="10"> 40+</option>
                        </select>
                     </div>
                   </div>
                   <p>[animate type="fadeInUp"]</p>
                  <p>[accordions class="question"]</p>
                 <p>[accordion title="Your interest area"]</p>
                    
                       <div class="row"> 
                    <div class="col-lg-3">
                        Your special interest area:
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                    <input type="checkbox" name="Acupuncture-dry-needing<?php echo $i;?>" id="Acupuncture-dry-needing<?php echo $i;?>" value=""> <label for="Acupuncture-dry-needing<?php echo $i;?>">Acupuncture and dry needling</label>
                   
                    </div>
                     <div class="col-lg-4">
                      <input type="checkbox" name="Adolescents<?php echo $i;?>" id="Adolescents<?php echo $i;?>" value=""> <label for="Adolescents<?php echo $i;?>">Adolescents</label>
                    </div>
                       <div class="col-lg-4">
                    <input type="checkbox" name="Ageing-well<?php echo $i;?>" id="Ageing-well<?php echo $i;?>" value=""> <label for="Ageing-well<?php echo $i;?>">Ageing well</label>
                    </div>
                  
                 </div>
                  <div class="row">
                       <div class="col-lg-4">
                    <input type="checkbox" name="Amputees<?php echo $i;?>" id="Amputees<?php echo $i;?>" value=""> <label for="Amputees<?php echo $i;?>">Amputees</label>
                    </div>
                        <div class="col-lg-4">
                      <input type="checkbox" name="Arthritis<?php echo $i;?>" id="Arthritis<?php echo $i;?>" value=""> <label for="Arthritis<?php echo $i;?>">Arthritis</label>
                    </div>
                    <div class="col-lg-4">
                    <input type="checkbox" name="Babies-children<?php echo $i;?>" id="Babies-children<?php echo $i;?>" value=""> <label for="Babies-children<?php echo $i;?>">Babies and children</label>
                    </div>
                   </div>
                  <div class="row">
                      <div class="col-lg-4">
                    <input type="checkbox" name="Back-neck<?php echo $i;?>" id="Back-neck<?php echo $i;?>" value=""> <label for="Back-neck<?php echo $i;?>">Back and neck</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Bowel<?php echo $i;?>" id="Bowel<?php echo $i;?>" value=""> <label for="Bowel<?php echo $i;?>">Bowel and bladder health</label>
                    </div>
                      <div class="col-lg-4">
                    <input type="checkbox" name="Brain<?php echo $i;?>" id="Brain<?php echo $i;?>" value=""> <label for="Brain<?php echo $i;?>">Brain and spinal cord</label>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-4">
                    <input type="checkbox" name="Cancer<?php echo $i;?>" id="Cancer<?php echo $i;?>" value=""> <label for="Cancer<?php echo $i;?>">Cancer and lympheodema</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Chronic-pain<?php echo $i;?>" id="Chronic-pain<?php echo $i;?>" value=""> <label for="Chronic-pain<?php echo $i;?>">Chronic pain</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Wdisability<?php echo $i;?>" id="Wdisability<?php echo $i;?>" value=""> <label for="Wdisability<?php echo $i;?>">Disability</label>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-lg-4">
                    <input type="checkbox" name="Wdiabetes<?php echo $i;?>" id="Wdiabetes<?php echo $i;?>" value=""> <label for="Wdiabetes<?php echo $i;?>">Diabetes</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Feldenkrais<?php echo $i;?>" id="Feldenkrais<?php echo $i;?>" value=""> <label for="Feldenkrais<?php echo $i;?>">Feldenkrais</label>
                    </div>
                      <div class="col-lg-4">
                    <input type="checkbox" name="Hand-therapy<?php echo $i;?>" id="Hand-therapy<?php echo $i;?>" value=""> <label for="Hand-therapy<?php echo $i;?>">Hand therapy</label>
                    </div>
                  </div>
                  <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Head-face<?php echo $i;?>" id="Head-face<?php echo $i;?>" value=""> <label for="Head-face<?php echo $i;?>">Head and face</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Healthwork<?php echo $i;?>" id="Healthwork<?php echo $i;?>" value=""> <label for="Healthwork<?php echo $i;?>">Health at work</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Heart-lung<?php echo $i;?>" id="Heart-lung<?php echo $i;?>" value=""> <label for="Heart-lung<?php echo $i;?>">Heart and lung health</label>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Hydrotherapy<?php echo $i;?>" id="Hydrotherapy<?php echo $i;?>" value=""> <label for="Hydrotherapy<?php echo $i;?>">Hydrotherapy</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Lower-limbs<?php echo $i;?>" id="Lower-limbs<?php echo $i;?>" value=""> <label for="Lower-limbs<?php echo $i;?>">Lower limbs</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Wmen-health<?php echo $i;?>" id="Wmen-health<?php echo $i;?>" value=""> <label for="Wmen-health<?php echo $i;?>">Men’s health</label>
                    </div>
                  </div>
                        <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Neurological-conditions<?php echo $i;?>" id="Neurological-conditions<?php echo $i;?>" value=""> <label for="neurological-conditions<?php echo $i;?>">Neurological conditions</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Worthopaedics<?php echo $i;?>" id="Worthopaedics<?php echo $i;?>" value=""> <label for="Worthopaedics<?php echo $i;?>">Orthopaedics</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Palliative-care<?php echo $i;?>" id="Palliative-care<?php echo $i;?>" value=""> <label for="Palliative-care<?php echo $i;?>">Palliative care</label>
                    </div>
                  </div>
                     <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Pilates<?php echo $i;?>" id="Pilates<?php echo $i;?>" value=""> <label for="Pilates<?php echo $i;?>">Pilates</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Pre-post<?php echo $i;?>" id="Pre-post<?php echo $i;?>" value=""> <label for="Pre-post<?php echo $i;?>">Pre and post-natal</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Pre-surgey<?php echo $i;?>" id="Pre-surgey<?php echo $i;?>" value=""> <label for="Pre-surgey<?php echo $i;?>">Pre and post-surgery</label>
                    </div>
                  </div>
                   <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Stroke-recovery<?php echo $i;?>" id="Stroke-recovery<?php echo $i;?>" value=""> <label for="Stroke-recovery<?php echo $i;?>">Stroke recovery</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Sexual-health<?php echo $i;?>" id="Sexual-health<?php echo $i;?>" value=""> <label for="Sexual-health<?php echo $i;?>">Sexual health</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Sport-injuries<?php echo $i;?>" id="Sport-injuries<?php echo $i;?>" value=""> <label for="Sport-injuries<?php echo $i;?>">Sport injuries</label>
                    </div>
                  </div>
                 <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Upper-limbs<?php echo $i;?>" id="Upper-limbs<?php echo $i;?>" value=""> <label for="Upper-limbs<?php echo $i;?>">Upper limbs</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Women-health<?php echo $i;?>" id="Women-health<?php echo $i;?>" value=""> <label for="Women-health<?php echo $i;?>">Women’s health</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Yoga<?php echo $i;?>" id="Yoga<?php echo $i;?>" value=""> <label for="Yoga<?php echo $i;?>">Yoga</label>
                    </div>
                  </div>
                
                  <p>[/accordion]</p>
                  <p>[/accordions]</p>
                  <p>[/animate]</p>
                  <a class="add-workplace"><span class="dashboard-button-name">Add workplace</span></a>
                </div>
            
              <?php endfor; ?>
               </div>
               <div class="down11" style="display:none;" >
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="Udegree">Undergraduate degree</label>
                        <input type="text" class="form-control" name="Udegree" id="Udegree">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="undergraduate-university-name">Undergraduate university name</label>
                        <input type="text" class="form-control" name="Undergraduate-university-name" id="Undergraduate-university-name">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-4">
                        <label for="ugraduate-country">Country</label>
                        <input type="text" class="form-control" name="Ugraduate-country" id="Ugraduate-country">
                     </div>
                     <div class="col-lg-2">
                        <label for="ugraduate-year-attained">Year attained</label>
                        <input type="text" class="form-control" name="Ugraduate-year-attained" id="Ugraduate-year-attained">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="pdegree">Postgraduate degree</label>
                        <input type="text" class="form-control" name="Pdegree" id="Pdegree">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="postgraduate-university-name">Postgraduate university name</label>
                        <input type="text" class="form-control" name="Postgraduate-university-name" id="Postgraduate-university-name">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-4">
                        <label for="pgraduate-country">Country</label>
                        <input type="text" class="form-control" name="Pgraduate-country" id="Pgraduate-country">
                     </div>
                     <div class="col-lg-2">
                        <label for="pgraduate-year-attained">Year attained</label>
                        <input type="text" class="form-control" name="Pgraduate-year-attained" id="Pgraduate-year-attained">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="Additional-qualifications">Additional qualifications</label>
                        <input type="text" class="form-control" name="Additional-qualifications" id="Additional-qualifications">
                     </div>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding" id="your-details-button">   <button  class="dashboard-button dashboard-bottom-button your-details-submit"><span class="dashboard-button-name">Submit</span></button></div>
            </form>
         
         </div>
      </div>
   </div>
</div>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function($) {
     
   });
</script>