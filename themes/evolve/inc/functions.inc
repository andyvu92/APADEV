<?php
/* Entire website's PHP functions will be here  */


/*Dashboard page render national icons fuction*/
/*Dashboard page*/
function nationalIcons(){
   $nationalIcons = array(
             array("AcuPunctureNeedling","APN"),
             array("Animal","ANI"),
             array("Aquatic","AQA"),
             array("Cardio","CAR"),
             array("CancerPalliaLymp","CAN"),
             array("Disability","DIS"),
             array("Education","EDU"),
             array("Gerontology","GEN"),
             array("Musculoskeletal","MUS"),
             array("Neurology","NEU"),
             array("OccupationalHealth","OCC"),
             array("Paediatric","PAE"),
             array("Sport","SPT"),
             array("WomenMenPelvic","PEL"),
             array("Student","STU"),
             array("LeadershipManagement","LED"),
             array("Rural","RUL"),
             array("Business","BUS"),
             array("EmergencyDepartment","EMG"),
             array("MentalHealth","MEN"),
             array("Pain","PAN"),
             array("Orthopaedic","ORT"),
         ); 
        $userIcons = array(0,1,2 ,3,3,5,6,7);
        $length = sizeof($userIcons);		
	    $k =0;
	    for($i=0; $i<$length/4; $i++){
			if($i==0){
					echo "<div class='item active'>";
				
					}
					else{
					echo "<div class='item'>";
					}
				   
			echo "<nav class='navbar'>";
			echo "<div class='container-fluid'>";
			echo "<ul class='nav navbar-nav'>";
	  	  	for($j=$k; $j<$k+4; $j++){
				if($j<$length){
					$num = intval($userIcons[$j]);
					echo "<li>";
                    echo '<a href="'.$nationalIcons[$num][0].'" class="icons">';
                    echo '<i class="fa '.$nationalIcons[$num][1].'">';
                    echo "</i>";
                    echo "</a>";
					echo "</li>";}
			}
			echo "</ul>";
			echo "</div>";
			echo "</nav>";	
			echo "</div>";
			$k=$i+4;
		}
}
/*PD detail page display product price fuction*/
/*Parameters: $priceList, $cost*/
/*PD detail page */
function comparePrice($priceList, $cost){
			     foreach($priceList as $key=>$value)
				 { 
				  if($cost>$value) {
					  echo '<span class="redprice">'.$key.":&nbsp;$".$value."</span><br>";
				   } 
				  elseif($cost<$value){
					  echo '<span class="greenprice">'.$key.":&nbsp;$".$value."</span><br>";
				  }
                  elseif($cost==$value){
					  echo $key.":&nbsp;$".$value."<br>";
				  }				  
			   
	     	 }
		 }
/*PD detail page check eligible user to purchase the product fuction*/
/*Parameters: $Job, $Professionalbody, $Professionalinsurance, $HearaboutAPA, $Registrationboard, $Dietary, $paymentCardList*/
/*PD detail page */
function checkPDUser($Job, $Professionalbody, $Professionalinsurance, $HearaboutAPA, $Registrationboard, $Dietary, $paymentCardList){
				 if(($Job!=NULL) && ($Professionalbody=="1") && ($Professionalinsurance=="1") && ($HearaboutAPA!=NULL) && ($Registrationboard=="1") && ($Registrationboard=="1") && (sizeof($Dietary)>0) && (sizeof($paymentCardList)>0))
				 {
					return "1"; 
				 }
				 else{
					 return "0";
				 }
			     
			 }
?>