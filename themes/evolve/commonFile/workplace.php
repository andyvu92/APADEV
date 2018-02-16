<?php 

$i = $_POST['count'];


 
                 echo '<div class="row"><div class="col-lg-6">&nbsp;</div><div class="col-lg-6"> <label for="Findphysio'.$i.'"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
                        <input type="checkbox" name="Findphysio'.$i.'" id="Findphysio'.$i.'" value="" ></div></div>
                   <div class="row">
				    <div class="col-lg-12">
					<label for="Name-of-workplace'.$i.'">Name of workplace</label>
					<input type="text" class="form-control" name="Name-of-workplace'.$i.'" id="Name-of-workplace'.$i.'">
					</div>
	
				  </div>
				  <div class="row">
                     <div class="col-lg-3">
                        Workplace setting
                     </div>
                     <div class="col-lg-9">
                        <select class="form-control" id="Workplace-setting'.$i.'" name="workplace-setting'.$i.'">
                          
						   ';
                          $workplace_json='{ 
							   "0": {
								   "name":"Aboriginal health services",
								   "code":"Aboriginal-health-services"
									},
								"1":{
									"name":"Defence forces",
								    "code":"Defence-forces"
								   },
								 "3":{
									"name":"Domiciliary services",
								    "code":"Domiciliary-services"
								 },
								 "4":{
									"name":"Education facility",
								    "code":"Education-facility"
								 },
								 "5":{
									"name":"Group private practice",
								    "code":"Group-private-practice"
								 },
								 "6":{
									"name":"Hospital(exclude outpatient)",
								    "code":"Hospital"
								 },
								 "7":{
									"name":"Locum private practice",
								    "code":"Locum-private-practice"
								 }
							   
							 }';
							 $workplaceSettings = json_decode($workplace_json, true);
							 foreach($workplaceSettings  as $key => $value){
								echo '<option value="'.$workplaceSettings[$key]['code'].'">'.$workplaceSettings[$key]['name'].'</option>';
								 
							 }
                   echo     '</select>
                     </div>
                   </div>
				  
				  <div class="row">
                     <div class="col-lg-6">
                        <label for="BuildingName'.$i.'">Practice Name</label>
                        <input type="text" class="form-control" name="WBuildingName'.$i.'" id="WBuildingName'.$i.'" value="">
                     </div>
                     <div class="col-lg-2">
                        <label for="Wunit'.$i.'">Unit/house number</label>
                        <input type="text" class="form-control" name="Wunit'.$i.'" id="Wunit'.$i.'" value="">
                     </div>
                     <div class="col-lg-4">
                        <label for="Wstreet'.$i.'">Street name</label>
                        <input type="text" class="form-control" name="Wstreet'.$i.'" id="Wstreet'.$i.'" value="">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <label for="Wcity'.$i.'">City/Town</label>
                        <input type="text" class="form-control" name="Wcity'.$i.'" id="Wcity'.$i.'" value="">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wpostcode'.$i.'">Postcode</label>
                        <input type="text" class="form-control" name="Wpostcode'.$i.'" id="Wpostcode'.$i.'" value="">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wstate'.$i.'">State</label>
                        <input type="text" class="form-control" name="Wstate'.$i.'" id="Wstate'.$i.'" value="">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wcountry'.$i.'">Country</label>
                        <input type="text" class="form-control" name="Wcountry'.$i.'" id="Wcountry'.$i.'" value="">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="Wemail'.$i.'">Workplace email</label>
                        <input type="text" class="form-control" name="Wemail'.$i.'" id="Wemail'.$i.'" value="">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wwebaddress'.$i.'">Website</label>
                        <input type="text" class="form-control" name="Wwebaddress'.$i.'" id="Wwebaddress'.$i.'" value="">
                     </div>
                     <div class="col-lg-3">
                        <label for="Wphone'.$i.'">Phone number</label>
                        <input type="text" class="form-control" name="Wphone'.$i.'" id="Wphone'.$i.'" value="">
                     </div>
                  </div>
               
                 
 
                  


                         <div class="row">
                     <div class="col-lg-3">
                        Does this workplace offer additional languages?
                     </div>
                     <div class="col-lg-3">
					 
                        <select class="chosen-select" multiple id="Additionallanguage'.$i.'" name="Additionallanguage'.$i.'[]">
                           <option value="NONE" disabled="" >no</option>
                           <option value="AF" selected> Afrikaans </option>
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
                         <input type="text" class="form-control" name="QIP'.$i.'" id="QIP'.$i.'" value="">
                     </div>
                  </div>
                  <div class="row"> 
                    <div class="col-lg-3">
                        Does this workplace provide:
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                    <input type="checkbox" name="Electronic-claiming'.$i.'" id="Electronic-claiming'.$i.'" value="" > <label for="Electronic-claiming'.$i.'">Electronic claiming</label>
                   
                    </div>
                     <div class="col-lg-6">
                      <input type="checkbox" name="Hicaps'.$i.'" id="Hicaps'.$i.'" value="" > <label for="Hicaps'.$i.'">HICAPS</label>
                    </div>
                 
                 </div>
                  <div class="row">
                       <div class="col-lg-6">
                    <input type="checkbox" name="Healthpoint'.$i.'" id="Healthpoint'.$i.'" value="0"> <label for="Healthpoint'.$i.'">Healthpoint</label>
                    </div>
                    <div class="col-lg-6">
                    <input type="checkbox" name="Departmentva'.$i.'" id="Departmentva'.$i.'" value="0"> <label for="Departmentva'.$i.'">Department of Vetarans Affairs</label>
                    </div>
                   </div>
                  <div class="row">
                     <div class="col-lg-6">
                      <input type="checkbox" name="Workerscompensation'.$i.'" id="Workerscompensation'.$i.'" value="0"> <label for="Workerscompensation'.$i.'">Workers compensation</label>
                    </div>
                    <div class="col-lg-6">
                    <input type="checkbox" name="Motora'.$i.'" id="Motora'.$i.'" value="0"> <label for="Motora'.$i.'">Motor accident compensation</label>
                    </div>
                   
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                    <input type="checkbox" name="Medicare'.$i.'" id="Medicare'.$i.'" value="0"> <label for="Medicare'.$i.'">Medicare Chronic Disease Management</label>
                    </div>
					<div class="col-lg-6">
                    <input type="checkbox" name="Homehospital'.$i.'" id="Homehospital'.$i.'" value="0"> <label for="Homehospital'.$i.'">Home and hospital visits</label>
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-lg-6">
                    <input type="checkbox" name="MobilePhysio'.$i.'" id="MobilePhysio'.$i.'" value="0"> <label for="MobilePhysio'.$i.'">Mobile physiotherapist</label>
                    </div>
					
                  </div>
                    
                   <div class="row">
                     <div class="col-lg-3">
                        Numbers of hours worked
                     </div>
                     <div class="col-lg-6">
                        <select class="form-control" id="Number-worked-hours'.$i.'" name="Number-worked-hours'.$i.'">
                           <option value="0" disabled="">no</option>
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
				         <div class="row"> 
                    <div class="col-lg-3">
                        Your special interest area:
                    </div>
					
					  <div class="col-lg-9">
					   
                        <select class="chosen-select" id="interest-area'.$i.'" name="interest-area'.$i.'[]" multiple  tabindex="-1" data-placeholder="Choose interest area...">';
						  
						    // get interest area list from Aptify via webserice return Json data;
							$interestarea_json='{ 
							   "0": {
								   "ListName":"Acupuncture and dry needling",
								   "ListCode":"ACU"
									},
								"1":{
									"ListName":"Adolescents",
								    "ListCode":"ADO"
								   },
								 "3":{
									"ListName":"Aging well",
								    "ListCode":"AGE"
								 },
								 "4":{
									"ListName":"Amputees",
								    "ListCode":"AMP"
								 },
								 "5":{
									"ListName":"Arthritis",
								    "ListCode":"ART"
								 },
								 "6":{
									"ListName":"Babies and children",
								    "ListCode":"CHILD"
								 },
								 "7":{
									"ListName":"Back and neck",
								    "ListCode":"BAN"
								 }
							   
							 }';
							 $interestAreas = json_decode($interestarea_json, true);
						
						     foreach($interestAreas  as $key => $value){
								echo '<option value="'.$interestAreas[$key]['ListCode'].'">'.$interestAreas[$key]['ListName'].'</option>';
								 
							 }
						   
						  
                   echo     '</select>
                     </div>
                  </div>
                  
  ';






               



?>