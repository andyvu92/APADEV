
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
               <li><a class="tabtitle1" style="cursor: pointer;"><span class="text-underline eventtitle1" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
           
               <li><a class="tabtitle2" style="cursor: pointer;"><span class="eventtitle2" id="membership"><strong>Membership</strong></span></a></li>
               
               <li><a class="tabtitle3" style="cursor: pointer;"><span class="eventtitle3" id="workplace"><strong>Workplace</strong></span></a></li>
               <li><a class="tabtitle4" style="cursor: pointer;"><span class="eventtitle4" id="education"><strong>Education</strong></span></a></li>
               <li><a class="tabtitle5" style="cursor: pointer;"><span class="eventtitle5" id="payment"><strong>Insurance</strong></span></a></li>
			   <li><a class="tabtitle6" style="cursor: pointer;"><span class="eventtitle6" id="payment"><strong>Survey</strong></span></a></li>
			   <li><a class="tabtitle7" style="cursor: pointer;"><span class="eventtitle7" id="payment"><strong>Payment</strong></span></a></li>
			   <li><a class="tabtitle8" style="cursor: pointer;"><span class="eventtitle8" id="payment"><strong>Review</strong></span></a></li>
			</ul>
            <form name="your-details">
               <div class="down1">
                  <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 none-padding">
                     <div class="row">
                        <div class="col-lg-3">
                           <label for="prefix">Prefix<span>*</span></label>
                           <select class="form-control" id="Prefix" name="Prefix">
                              <option value="" selected disabled>Prefix</option>
                              <option value="Prof">Prof</option>
                              <option value="Dr">Dr</option>
                              <option value="Mr">Mr</option>
                              <option value="Mrs">Mrs</option>
                              <option value="Miss">Miss</option>
                              <option value="Ms">Ms</option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="">First/preferred name<span>*</span></label>
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
                           <label for="">Last name<span>*</span></label>
                           <input type="text" class="form-control" name="Lastname">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <label for="">Birth Date<span>*</span></label>
                           <input type="date" class="form-control" name="Birth">
                        </div>
                        <div class="col-lg-3 col-lg-offset-1">
                           <label for="">Gender<span>*</span></label>
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
                           Aboriginal and Torres Strait Islander origin<span>*</span>
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
                        <div class="col-lg-12">Preferred address:</div>
                     </div>
					 <div class="row">
					    <div class="col-lg-4">
                           <label for="">Building name</label>
                           <input type="text" class="form-control"  name="BuildingName">
                        </div>
					 </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <label for="">Unit/house number<span>*</span></label>
                           <input type="text" class="form-control"  name="Unit">
                        </div>
                        <div class="col-lg-6 col-lg-offset-2">
                           <label for="">PO box</label>
                           <input type="text" class="form-control" name="Pobox">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <label for="">Street name<span>*</span></label>
                           <input type="text" class="form-control" name="Street">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <label for="">City or town<span>*</span></label>
                           <input type="text" class="form-control" name="Suburb">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-3">
                           <label for="">Postcode<span>*</span></label>
                           <input type="text" class="form-control" name="Postcode">
                        </div>
                        <div class="col-lg-3">
                           <label for="">State<span>*</span></label>
                           <select class="form-control" id="State" name="State">
                              <option value="" selected disabled> State </option>
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
                           <label for="">Country<span>*</span></label>
                           <input type="text" class="form-control" name="Country">
                        </div>
                     </div>
             <!--       
                  <div class="row">
				     <div class="col-lg-12"><label for="Shipping-address"><strong>Shipping address:(Sames as Billing address)</strong></label><input type="checkbox" id="Shipping-address" checked></div>
                  
                  </div>
                  
                  
                    <div class="row shipping" id="shippingAddress">
					    <div class="col-lg-4">
                           <label for="">Unit/house number</label>
                           <input type="text" class="form-control"  name="Shipping-unitno">
                        </div>
                        <div class="col-lg-6 col-lg-offset-2">
                           <label for="">PO box</label>
                           <input type="text" class="form-control" name="Pobox">
                        </div>
					     <div class="col-lg-12">
                           <label for="">Street name</label>
                           <input type="text" class="form-control" name="Shipping-streetname">
                        </div>
						<div class="col-lg-12">
                           <label for="">City or town</label>
                           <input type="text" class="form-control" name="Suburb">
                        </div>
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
					 
			-->
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
                     <div class="row form-image">
                        <div class="col-lg-12">
                           Upload/change image
                        </div>
                     </div>
                                               
                  </div>
				  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button1"><span class="dashboard-button-name">Next</span></a></div>
               </div>
               <div class="down2" style="display:none;" >
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">Member ID(Your email address)<span>*</span></label>
                        <input type="text" class="form-control" name="Memberid" >
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">Member Type<span>*</span></label>
                        <select class="form-control" id="MemberType" name="MemberType">
                           <option value="none" selected disabled>memberType</option>
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
                        <label for="">Your National group</label>
                         <select class="form-control" id="Nationalgp" name="Nationalgp">
                           <option value="none" selected disabled>National group</option>
                           <option value="250-ACG">Acupuncture and dry needling</option>
                           <option value="202-APG">Animal</option>
                           <option value="200-AG">Aquatic</option>
                           <option value="262-PBA-BA">Business - Affiliate</option>
                           <option value="262-PBA-PP">Business – Premium principal</option>
                           <option value="410-ON">Cancer, palliative care and lymphoedema</option>
                           <option value="208-CRP">Cardiorespiratory</option>
                           <option value="422-DA">Disability</option>
                           <option value="214-EDU">Educators</option>
                           <option value="405-ED">Emergency department</option>
                           <option value="216-GG">Gerontology</option>
                           <option value="226-PLM">Leadership and management</option>
                           <option value="420-MH">Mental health</option>
                           <option value="254-MPA">Musculoskeletal</option>
                           <option value="220-NG">Neurology</option>
                           <option value="222-OHP">Occupational health</option>
                           <option value="400-OG">Orthopaedic</option>
                           <option value="224-PDG">Paediatric</option>
                           <option value="415-PN">Pain</option>
                           <option value="258-SPA">Sports</option>
                           <option value="212-CWH">Women’s, men’s and pelvic health</option>
                         </select>
                     </div>
					 <div class="col-lg-3 display-none" id="ngsports"><label for="ngsportsbox">Would you like to subscribe to the APA SportsPhysio magazine?</label><input type="checkbox" id="ngsportsbox" checked></div>
					 <div class="col-lg-3 display-none" id="ngmusculo"><label for="ngsportsbox">Would you like to subscribe to the APA InTouch magazine?</label><input type="checkbox" id="ngsportsbox" checked></div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">What branch would you like to join?</label>
                         <select class="form-control" id="Branch" name="Branch">
                           <option value="" selected disabled>What branch would you like to join?</option>
                           <option value="ACT">ACT</option>
                           <option value="NSW">NSW</option>
                           <option value="QLD">QLD</option>
                           <option value="SA">SA</option>
                           <option value="TAS">TAS</option>
                           <option value="VIC">VIC</option>
                           <option value="WA">WA</option>
                           <option value="Overseas">I live overseas</option>
                         </select>
                     </div>
                  </div>
				 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button2"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton2"><span class="dashboard-button-name">Last</span></a></div>
               </div>
              
              
               <div id="wpnumber"><?php  $wpnumber =  3; echo  $wpnumber; ?></div>
               
                 <script type="text/javascript">
                  jQuery(document).ready(function($) {
                      $(".chosen-select").chosen({width: "100%"});
                      $('#workplace').click(function(){
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
               <div class="down3" style="display:none;">
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
			      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button3"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton3"><span class="dashboard-button-name">Last</span></a></div>
               </div>
               <div class="down4" style="display:none;" >
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
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="join-details-button4"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton4"><span class="dashboard-button-name">Last</span></a></div>
               </div>
               
            
			     <div class="down5" style="display:none;" >
				    <div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Has there been any medical malpractice or liability claim in the last five years(whether insured or uninsured)?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Claim1">Yes</label><input type="checkbox" id="Claim1"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Claim2">No</label><input type="checkbox" id="Claim2"></div>
					</div>
				    <div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Are there any facts or circumstances that may give risk to a claim against any insured, including any predecessors in business?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Facts1">Yes</label><input type="checkbox" id="Facts1"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Facts2">No</label><input type="checkbox" id="Facts2"></div>
					</div>
					<div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Has there been any external disciplinary proceeding or been subject to a complaint to a professional society or statutory registration board in the last five years?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Disciplinary1">Yes</label><input type="checkbox" id="Disciplinary1"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Disciplinary2">No</label><input type="checkbox" id="Disciplinary2"></div>
					</div>
					<div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Has any insurer ever declined a proposal, impose special terms, decline to renew or cancel an insurance policy?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Decline1">Yes</label><input type="checkbox" id="Decline1"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Decline2">No</label><input type="checkbox" id="Decline2"></div>
					</div>
					<div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Have you had more than one claim?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Oneclaim1">Yes</label><input type="checkbox" id="Oneclaim1"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Oneclaim2">No</label><input type="checkbox" id="Oneclaim2"></div>
					</div>
					<div class="display-none" id="insuranceMore">
					  <div class="row">If you answered yes to one or more of the above questions (1-5) please provide:</div>
					  <div class="row">
						  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							 <input type="text" class="form-control" name="Yearclaim" id="Yearclaim" placeholder="Year of claim">
					      </div>
						  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							 <input type="text" class="form-control" name="Nameclaim" id="Nameclaim" placeholder="Name of claimant">
					      </div>
						  
					  </div>
					  <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="text" class="form-control" name="Fulldescription" id="Fulldescription" placeholder="Full description of insurance"></div></div>
					  <div class="row">Insufficient details in your response may result in additional details being requested</div>
					  <div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						 <input type="text" class="form-control" name="Amountpaid" id="Amountpaid" placeholder="Amount paid (if nil, please state NIL)">
					    </div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					    Has the claim been finalised?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Finalisedclaim1">Yes</label><input type="checkbox" id="Finalisedclaim1"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Finalisedclaim2">No</label><input type="checkbox" id="Finalisedclaim2"></div>
					  </div>
					  <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="text" class="form-control" name="Fulldescription" id="Fulldescription" placeholder="Business name, practice name or trading name owned by you, do not name your employer’s business."></div></div>
				  </div>
				   <div class="row">
					  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					    <input type="checkbox" id="conditions"><label for="conditions">I acknowledge I have read the conditions, declare my responses are correct and I am not aware of any
other material information to be disclosed</label>
					  </div>
					 
					</div>
			
			 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="join-details-button5"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton5"><span class="dashboard-button-name">Last</span></a></div>
         </div>
		        <div class="down6" style="display:none;" >
				    <div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Do you currently or plan to provide services to professional sport people in the AFL, A League, ARU, NRL, Cricket Australia or Olympic Representatives?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s1">Yes</label><input type="checkbox" id="s1"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s1-1">No</label><input type="checkbox" id="s1-1"></div>
					</div>
				     <div class="row">
					  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					    Number of professional sports people treated within the last 12 months
					  </div>
					  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="text" class="form-control" name="s2" id="s2" placeholder="Amount"></div>
					  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					    Percentage of your income obtained from professional sports people
					  </div>
					  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="text" class="form-control" name="s3" id="s3" placeholder="%"></div>
					</div>
					<div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Do you currently or plan to provide services to thoroughbred horses?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s4">Yes</label><input type="checkbox" id="s4"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s4-1">No</label><input type="checkbox" id="s4-1"></div>
					</div>
					  <div class="row">
					  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					    Number of thoroughbred horses treated within the last 12 months
					  </div>
					  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="text" class="form-control" name="s5" id="s5" placeholder="Amount"></div>
					  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					    Percentage of your income obtained from thoroughbred horses
					  </div>
					  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="text" class="form-control" name="s6" id="s6" placeholder="%"></div>
					</div>
				    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="join-details-button6"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton6"><span class="dashboard-button-name">Last</span></a></div>
				</div>
		          <div class="down7" style="display:none;" >
				     <div class="row">
					  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					    Payment options:
					  </div>
					  
					  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><label for="p1-1">Full payment</label><input type="checkbox" id="p1-1"><label for="p1-2">Monthly instalments</label><input type="checkbox" id="p1-2">This option incurs a $12.00 admin fee.</div>
					</div>
				   <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">PRF donation</div></div>
				   <div class="row">
				      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					      <select class="form-control" id="PRF" name="PRF">
                              <option value="">$0.00</option>
                              <option value="AB">$5.00</option>
                              <option value="TSI">$10.00</option>
                              <option value="BOTH">$20.00</option>
							  <option value="BOTH">$30.00</option>
							  <option value="BOTH">$50.00</option>
							  <option value="BOTH">$100.00</option>
                           </select>
					  </div>
					  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">What is this?</div>
				      
				   </div>
				     <div class="row">
					  
				   <div class="col-lg-3">
				        
                        <select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
						   <option value="" disabled>Card type</option>
                           <option value="AE">American Express</option>
                           <option value="Visa">Visa</option>
                           <option value="Mastercard">Mastercard</option>
                        </select>
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-6">
                        <input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-6">
                        <input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number">
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-4">
                        <input type="date" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date">
                   </div>
				   <div class="col-lg-3">
                        <input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV">
                   </div>
				 </div>
                   <div class="row">
				    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label id="privacypolicyl">Privacy policy</label><input type="checkbox" id="privacypolicy"></div>
						
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label id="instalmentpolicyl">Instalment/payment policy</label><input type="checkbox" id="instalmentpolicy"></div>
				   
				   </div>   
                   	   
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="join-details-button7"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton7"><span class="dashboard-button-name">Last</span></a></div>
				  </div>
				  <div class="down8" style="display:none;" >
				     <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				           <table>
							   <tbody>
								 <tr>
								   <th>Product name</th>
								   <th>Price</th>
								   <th>Delete</th>
								 </tr>
								   <?php foreach( $products as $product){
										 
									   echo "<tr>";
											
											echo	"<td>".$product['Title']."</td>";
									   
											echo	"<td>".$product['Price']."</td>";
										
											echo        '<td><a target="_self" href="pd-shopping-cart?action=del&type=PD&productid='.$product['Id'].'"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a></td>';
									   echo "</tr>";    
									 
									}
								 ?>
							   </tbody>
						  </table>
		
                  </div>
					 <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 paymentsiderbar">
								  <div class="row ordersummary"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><span>YOUR ORDER</span></div></div>
							   <table>
									<tr>
									  <td>Sub total (Inc. GST)</td>
									  <td>A$<?php echo $price;?></td>
								   </tr>
									<tr>
									  <td>PRF donation</td>
									  <td>A$0.00</td>
								   </tr>
									 <tr>
									  <td>Total(Inc.GST)</td>
									  <td>A$<?php echo $price;?></td>
								   </tr>
						   </table>
					
						 <a target="_blank" class="addCartlink"><button class="placeorder" type="submit">PLACE YOUR ORDER</button></a>
				</div>
         
				  </div>
		  </form>
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
