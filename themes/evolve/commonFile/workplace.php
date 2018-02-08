<?php 

$i = $_POST['count'];


 
                 echo '<div class="row"><div class="col-lg-6">&nbsp;</div><div class="col-lg-6"> <label for="Findphysio'.$i.'"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
                        <input type="checkbox" name="Findphysio'.$i.'" id="Findphysio'.$i.'" value="" ></div></div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="Name-of-workplace'.$i.'">Practice Name</label>
                        <input type="text" class="form-control" name="Name-of-workplace'.$i.'" id="Name-of-workplace'.$i.'" value="">
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
					 
                        <select class="chosen-select" multiple id="Additionallanguage'.$i.'" name="Additionallanguage'.$i.'">
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
                  </div>
                    <div class="row">
                     <div class="col-lg-3">
                        Workplace setting
                     </div>
                     <div class="col-lg-6">
                        <select class="form-control" id="Workplace-setting'.$i.'" name="workplace-setting'.$i.'">
                           <option value="NONE" disabled="">no</option>
                           <option value="AHS" selected="selected"> Aboriginal health services </option>
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
                  
  <div class="dexp-animate animated fadeInDown" data-animate="fadeInDown">
                  <div id="dexp-accordions-wrapper" class="panel-group default">
                   <div class="panel panel-default">
  <div class="panel-heading">
  <h4 class="panel-title">
  <a class="collapsed" data-parent="#dexp-accordions-wrapper" data-toggle="collapse" href="#tabcontentC'.$i.'">Your interest area</a>';
  echo '</h4>
  </div>';
  
  echo '<div class="panel-collapse collapse " id="tabcontentC'.$i.'">';
   echo '<div class="panel-body">
                    
                       <div class="row"> 
                    <div class="col-lg-3">
                        Your special interest area:
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                    <input type="checkbox" name="Acupuncture-dry-needing'.$i.'" id="Acupuncture-dry-needing'.$i.'" value="0" > <label for="Acupuncture-dry-needing'.$i.'">Acupuncture and dry needling</label>
                   
                    </div>
                     <div class="col-lg-4">
                      <input type="checkbox" name="Adolescents'.$i.'" id="Adolescents'.$i.'" value="0"> <label for="Adolescents'.$i.'">Adolescents</label>
                    </div>
                       <div class="col-lg-4">
                    <input type="checkbox" name="Ageing-well'.$i.'" id="Ageing-well'.$i.'" value="0"> <label for="Ageing-well'.$i.'">Ageing well</label>
                    </div>
                  
                 </div>
                  <div class="row">
                       <div class="col-lg-4">
                    <input type="checkbox" name="Amputees'.$i.'" id="Amputees'.$i.'" value="0"> <label for="Amputees'.$i.'">Amputees</label>
                    </div>
                        <div class="col-lg-4">
                      <input type="checkbox" name="Arthritis'.$i.'" id="Arthritis'.$i.'" value="0"> <label for="Arthritis'.$i.'">Arthritis</label>
                    </div>
                    <div class="col-lg-4">
                    <input type="checkbox" name="Babies-children'.$i.'" id="Babies-children'.$i.'" value="0"> <label for="Babies-children'.$i.'">Babies and children</label>
                    </div>
                   </div>
                  <div class="row">
                      <div class="col-lg-4">
                    <input type="checkbox" name="Back-neck'.$i.'" id="Back-neck'.$i.'" value="0"> <label for="Back-neck'.$i.'">Back and neck</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Bowel'.$i.'" id="Bowel'.$i.'" value="0"> <label for="Bowel'.$i.'">Bowel and bladder health</label>
                    </div>
                      <div class="col-lg-4">
                    <input type="checkbox" name="Brain'.$i.'" id="Brain'.$i.'" value="0"> <label for="Brain'.$i.'">Brain and spinal cord</label>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-4">
                    <input type="checkbox" name="Cancer'.$i.'" id="Cancer'.$i.'" value="0"> <label for="Cancer'.$i.'">Cancer and lympheodema</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Chronic-pain'.$i.'" id="Chronic-pain'.$i.'" value="0"> <label for="Chronic-pain'.$i.'">Chronic pain</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Wdisability'.$i.'" id="Wdisability'.$i.'" value="0"> <label for="Wdisability'.$i.'">Disability</label>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-lg-4">
                    <input type="checkbox" name="Wdiabetes'.$i.'" id="Wdiabetes'.$i.'" value="0"> <label for="Wdiabetes'.$i.'">Diabetes</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Feldenkrais'.$i.'" id="Feldenkrais'.$i.'" value="0"> <label for="Feldenkrais'.$i.'">Feldenkrais</label>
                    </div>
                      <div class="col-lg-4">
                    <input type="checkbox" name="Hand-therapy'.$i.'" id="Hand-therapy'.$i.'" value="0"> <label for="Hand-therapy'.$i.'">Hand therapy</label>
                    </div>
                  </div>
                  <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Head-face'.$i.'" id="Head-face'.$i.'" value="0"> <label for="Head-face'.$i.'">Head and face</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Healthwork'.$i.'" id="Healthwork'.$i.'" value="0"> <label for="Healthwork'.$i.'">Health at work</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Heart-lung'.$i.'" id="Heart-lung'.$i.'" value="0"> <label for="Heart-lung'.$i.'">Heart and lung health</label>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Hydrotherapy'.$i.'" id="Hydrotherapy'.$i.'" value="0"> <label for="Hydrotherapy'.$i.'">Hydrotherapy</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Lower-limbs'.$i.'" id="Lower-limbs'.$i.'" value="0"> <label for="Lower-limbs'.$i.'">Lower limbs</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Wmen-health'.$i.'" id="Wmen-health'.$i.'" value="0"> <label for="Wmen-health'.$i.'">Men’s health</label>
                    </div>
                  </div>
                        <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Neurological-conditions'.$i.'" id="Neurological-conditions'.$i.'" value="0"> <label for="Neurological-conditions'.$i.'">Neurological conditions</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Worthopaedics'.$i.'" id="Worthopaedics'.$i.'" value="0"> <label for="Worthopaedics'.$i.'">Orthopaedics</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Palliative-care'.$i.'" id="Palliative-care'.$i.'" value="0" > <label for="Palliative-care'.$i.'">Palliative care</label>
                    </div>
                  </div>
                     <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Pilates'.$i.'" id="Pilates'.$i.'" value="0" > <label for="Pilates'.$i.'">Pilates</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Pre-post'.$i.'" id="Pre-post'.$i.'" value="0" > <label for="Pre-post'.$i.'">Pre and post-natal</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Pre-surgey'.$i.'" id="Pre-surgey'.$i.'" value="0" > <label for="Pre-surgey'.$i.'">Pre and post-surgery</label>
                    </div>
                  </div>
                   <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Stroke-recovery'.$i.'" id="Stroke-recovery'.$i.'" value="0" > <label for="Stroke-recovery'.$i.'">Stroke recovery</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Sexual-health'.$i.'" id="Sexual-health'.$i.'" value="0" > <label for="Sexual-health'.$i.'">Sexual health</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Sport-injuries'.$i.'" id="Sport-injuries'.$i.'" value="0" > <label for="Sport-injuries'.$i.'">Sport injuries</label>
                    </div>
                  </div>
                 <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Upper-limbs'.$i.'" id="Upper-limbs'.$i.'" value="0" > <label for="Upper-limbs'.$i.'">Upper limbs</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Women-health'.$i.'" id="Women-health'.$i.'" value="0" > <label for="Women-health'.$i.'">Womens health</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Yoga'.$i.'" id="Yoga'.$i.'" value="0" > <label for="Yoga'.$i.'">Yoga</label>
                    </div>
                  </div>
                
                  </div>
  </div>
</div>
                  </div>
                  </div>';






               



?>