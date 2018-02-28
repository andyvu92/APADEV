 
			<form id="join-insurance-form" action="renewmymembership" method="POST">
			  <input type="hidden" name="step2" value="2"/>
			     <div class="down5" <?php if(isset($_POST['step1']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?>  >
				    <div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Has there been any medical malpractice or liability claim in the last five years(whether insured or uninsured)?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Claim1">Yes</label><input type="radio" name="Claim" id="Claim1" value="Yes"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Claim2">No</label><input type="radio" name="Claim" id="Claim2" value="No"></div>
					</div>
				    <div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Are there any facts or circumstances that may give risk to a claim against any insured, including any predecessors in business?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Facts1">Yes</label><input type="radio" name="Facts" id="Facts1" value="Yes"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Facts2">No</label><input type="radio" name="Facts" id="Facts2" value="No"></div>
					</div>
					<div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Has there been any external disciplinary proceeding or been subject to a complaint to a professional society or statutory registration board in the last five years?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Disciplinary1">Yes</label><input type="radio" name="Disciplinary" id="Disciplinary1" value="Yes"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Disciplinary2">No</label><input type="radio" name="Disciplinary" id="Disciplinary2" value="No"></div>
					</div>
					<div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Has any insurer ever declined a proposal, impose special terms, decline to renew or cancel an insurance policy?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Decline1">Yes</label><input type="radio" name="Decline" id="Decline1" value="Yes"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Decline2">No</label><input type="radio" name="Decline" id="Decline2" value="No"></div>
					</div>
					<div class="row">
					  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    Have you had more than one claim?
					  </div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Oneclaim1">Yes</label><input type="radio" name="Oneclaim" id="Oneclaim1" value="Yes"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Oneclaim2">No</label><input type="radio" name="Oneclaim" id="Oneclaim2" value="No"></div>
					</div>
					<div class="display-none" id="insuranceMore">
					  <div class="row">If you answered yes to one or more of the above questions (1-5) please provide:<input type="hidden" name="Addtionalquestion" id="Addtionalquestion" value="0"></div>
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
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Finalisedclaim1">Yes</label><input type="radio" name="Finalisedclaim" id="Finalisedclaim1" value="Yes"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Finalisedclaim2">No</label><input type="radio" name="Finalisedclaim" id="Finalisedclaim2" value="No"></div>
					  </div>
					  <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="text" class="form-control" name="Businiessname" id="Businiessname" placeholder="Business name, practice name or trading name owned by you, do not name your employer’s business."></div></div>
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
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s1">Yes</label><input type="radio" id="s1" name="s1" value="Yes"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s1-1">No</label><input type="radio" id="s1-1" name="s1" value="No"></div>
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
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s4">Yes</label><input type="radio" id="s4" name="s4" value="Yes"></div>
					  <div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s4-1">No</label><input type="radio" id="s4-1" name="s4" value="No"></div>
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
					  
					  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><label for="p1-1">Full payment</label><input type="radio" name ="Paymentoption" id="p1-1" value="full"><label for="p1-2">Monthly instalments</label><input type="radio" name ="Paymentoption" id="p1-2" value="monthly">This option incurs a $12.00 admin fee.</div>
					</div>
				   <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">PRF donation</div></div>
				   <div class="row">
				      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					      <select class="form-control" id="PRF" name="PRF">
                              <option value="">$0.00</option>
                              <option value="5">$5.00</option>
                              <option value="10">$10.00</option>
                              <option value="20">$20.00</option>
							  <option value="30">$30.00</option>
							  <option value="50">$50.00</option>
							  <option value="100">$100.00</option>
							  <option value="other">Other</option>
                           </select>
					  </div>
					  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">What is this?</div>
				      
				   </div>
				   <?php ////web service 2.2.12 Get payment listing;
					  $cardsnum = GetAptifyData("12", "userID");?>
				   <?php if (sizeof($cardsnum)!=0): ?>  
                    <div class="row">					
				    <fieldset>
					 <select id="Paymentcard" name="Paymentcard">
                     
                            <?php foreach( $cardsnum["paymentcards"] as $cardnum):  ?>
                                 <option value="<?php echo  $cardnum["Digitsnumber"];?>" <?php if($cardsnum["Main-Creditcard-ID"]==$cardnum["Creditcards-ID"]) echo "selected"; ?> data-class="<?php echo  $cardnum["Payment-method"];?>">Credit card ending with <?php echo  $cardnum["Digitsnumber"];?></option>
                            <?php endforeach; ?>
                        
                        </select>
					 </fieldset>
					 </div> 
					 <?php endif; ?>  
				   <?php if (sizeof($cardsnum)==0): ?>  
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
				 <input type="hidden" name="addCard"> 
				  <?php endif; ?>  
                   <div class="row">
				    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label id="privacypolicyl">Privacy policy</label><input type="checkbox" id="privacypolicy"></div>
						
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label id="instalmentpolicyl">Instalment/payment policy</label><input type="checkbox" id="instalmentpolicy"></div>
				    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 display-none" id="rolloverblock"><label for="Rollover">Roll over</label><input type="checkbox" name="Rollover" id="Rollover"></div>
				   </div>   
                   	   
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('join-insurance-form').submit();" class="join-details-button7"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton7"><span class="dashboard-button-name">Last</span></a></div>
				  </div>
				</form>
	