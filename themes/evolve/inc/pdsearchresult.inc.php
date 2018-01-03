<?php
  global $base_url;

   $results_json='{  
        "Result0":
         { 
         "Id":"1",
        "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Sports Physiotherapy Level2",
         "Type":"Lecutre",
          "CPD":"2",
         "City":"Melbourne",
         "State":"VIC",
         "Begindate":"13/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"2"
             },
      "Result1": {  
       "Id":"2",
        "Summary":"Best practice requires advanced skills in diagnoses",
       "Title":"Pregancy and Postpartum:Clinical Highlights",
         "Type":"Online",
          "CPD":"2",
         "City":"Camberwell",
         "State":"VIC",
         "Begindate":"10/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"2"
      },
   "Result2": {  
         "Id":"3",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Sports Physiotherapy Level 2",
         "Type":"Lecture",
         "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"1/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"2"
      },
     "Result3": {  
         "Id":"4",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Pregancy and Postpartum:Clinical Highlights",
         "Type":"Lecture",
         "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"9/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"4"
      },
     "Result4": {  
         "Id":"5",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Aports Physiotherapy Level 2",
         "Type":"Lecture",
         "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"9/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"2"
      },
     "Result5": {  
         "Id":"6",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Aports Physiotherapy Level 2",
         "Type":"Lecture",
          "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"9/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"3"
      },
     "Result6": {  
         "Id":"7",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Aports Physiotherapy Level 2",
         "Type":"Lecture",
          "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"9/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"2"
      },
     "Result7": {  
         "Id":"8",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Aports Physiotherapy Level 2",
         "Type":"Lecture",
         "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"2/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"3"
      },
     "Result8": {  
         "Id":"9",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Aports Physiotherapy Level 2",
         "Type":"Lecture",
           "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"2/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"3"
      },
     "Result9": {  
         "Id":"10",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Aports Physiotherapy Level 2",
         "Type":"Lecture",
          "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"3/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"2"
      },
     "Result10": {  
         "Id":"11",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Aports Physiotherapy Level 2",
         "Type":"Lecture",
          "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"5/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"3"
      },
     "Result11": {  
         "Id":"12",
         "Summary":"Best practice requires advanced skills in diagnoses",
         "Title":"Aports Physiotherapy Level 2",
         "Type":"Lecture",
          "CPD":"2",
         "City":"Ringwood",
         "State":"VIC",
         "Begindate":"4/12/2017",
         "Enddate":"12/12/2018",
        "Eventstatus":"3"
      }

 
}';
   $results= json_decode($results_json, true);
    $totalNum = sizeof($results);
   ?>

<h3>PD BASED ON YOUR PROFILE</h3>
                 <?php
             
                   /********sort search result*****/
                     usort($results, function($a, $b) {
                      return $b['Begindate'] - $a['Begindate'];
                   });
                /******    
                   function compareByName($a, $b) {
                        return strcmp($a["Title"], $b["Title"]);
                    }
                    usort($results, 'compareByName');
                 ******/ 
                    $_SESSION["searchResult"] = $results;
                 
                   /********end sort*******/
               
			        /********search result pagination*****/
                              
                                       if(isset($_GET["pagesize"])){       
                                               $numItem = $_GET["pagesize"];
                                           }
                                       else{
                                          $numItem = 5;
                                       }
					$numPage = intdiv(sizeof($results),$numItem)+1;
                                     if(isset($_GET["page"])&&($_GET["page"]!=1)){   
                                              echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page=1&pagesize='.$numItem.'"><div class="Pagebutton"><<</div></a>';     
                                              $last = $_GET["page"]-1;
                                              echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$last .'&pagesize='.$numItem.'"><div class="Pagebutton"><</div></a>';          
                                       }
					for($i=1;$i<=$numPage;$i++){
					  			echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$i.'&pagesize='.$numItem.'"><div class="Pagebutton">'.$i.'</div></a>';
					}
										
					/********end search result pagination*******/
					if(isset($_GET["page"])){
					    $resultTemp = $_SESSION["searchResult"];
				           $numResult = ($_GET["page"]-1)*$numItem;
                                               $results = array_slice($resultTemp, $numResult,$numItem);
                                        }
                                        else{
					    $results = array_slice($results,0,$numItem); 
                                           $numResult = 0;
                                            echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page=2&pagesize='.$numItem.'"><div class="Pagebutton">></div></a>';      
					}
                                        
                                            if(isset($_GET["page"])&&($_GET["page"]!=$numPage)){   
                                               $next = $_GET["page"]+1;
                                               echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$next.'&pagesize='.$numItem.'"><div class="Pagebutton">></div></a>';                                        
				            }
                                            if(!isset($_GET["page"])||($_GET["page"]!=$numPage)){  
                                            echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$numPage.'&pagesize='.$numItem.'"><div class="Pagebutton">>></div></a>';  
                                           }     
               
                      /**************************************pagination functionality***************************/      
                
 ?>
                            <div class="pageSetting"><p>Pagesize:</p><select id="pagesize" name="pagesize" onchange="pagesize(this)"><option value="1" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==5)){ echo "selected";  } ?>> 5 </option><option value="2" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==10)){ echo "selected";  }  ?>> 10 </option></select></div>
                           <div class="pageItem"><p><span class="pageItemDes">Item </span><span class="pageItemDes"><?php  if(isset($_GET["page"])&&($_GET["page"]!=1)){ echo $numResult+1;} else{ echo "1";}  ?></span><span class="pageItemDes">to</span><span class="pageItemDes"><?php if((isset($_GET["page"])&&$_GET["page"]!=$numPage)||!isset($_GET["page"])){ echo $numResult+$numItem;} else{ echo $totalNum;} ?></span><span class="pageItemDes">of</span><span class="pageItemDes"><?php echo $totalNum;?></span></p></div>
        <?php              /**************************************pagination settings***************************/        ?>  
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="padding:0;">
<table class="table table-responsive resultTable">
	<tbody>
		<tr>
			<th>TITLE</th>
			<th>TYPE</th>
                         <th>CPD HRS</th>
			<th>CITY</th>
			<th>STATE</th>
			<th>BEGIN DATE</th>
			<th>END DATE</th>
			<th>ADD TO WISHLIST</th>
		</tr>
         
   <?php
             foreach($results as $result){
                     
		echo "<tr>";
                echo	'<td><a target="_blank" href="pd-product?id='.$result['Id'].'">'.$result['Title']."</a><br>".$result['Summary'].'<br><a target="_blank" href="pd-product?id='.$result['Id'].'"><span style="text-decoration:underline;">Read more</span></a></td>';
                echo	"<td>".$result['Type']."</td>";
                echo	"<td>".$result['CPD']."</td>";
                echo	"<td>".$result['City']."</td>";
                echo	"<td>".$result['State']."</td>";
		echo	"<td>".$result['Begindate']."</td>";
               echo	        "<td>".$result['Enddate']."</td>";
                echo	 "<td>";
              switch($result['Eventstatus']){
                  case "1":
                        echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['Id'].'&pd_type='.$result['Type'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></a></i>';
                        break;
                   case "2":
                        echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['Id'].'&pd_type='.$result['Type'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></a></i>';
                        break;
                    case "3":
                        echo  "COURSE  FULL";
                        break;
                     case "4":
                        echo "Registration closed";
                        break;
                     default:
                       echo "none";
               }
         
               echo  "</td>";
                 echo "</tr>";
          
             }
	?>	
	</tbody>
</table>

<div class="resultMobile">
 <?php foreach($results as $result){
 echo '<div class="resultDisplay">';
 echo '<div class="resultTitle"><span class="mobiledes">Title:</span><a target="_blank" href="pd-product?id='.$result['Id'].'">'.$result['Title']."</a><br>".$result['Summary'].'<br><a target="_blank" href="pd-product?id='.$result['Id'].'"><span style="text-decoration:underline;">Read more</span></a></div>';
 echo '<div class="resultType"><span class="mobiledes">Type:</span>'.$result['Type'].'&nbsp;<span class="mobiledes">CPD HRS:</span>'.$result['CPD'].'</div>';
 echo '<div class="resultState"><span class="mobiledes">City:</span>'.$result['City'].'&nbsp;<span class="mobiledes">State:</span>'.$result['State'].'</div>';
 echo '<div class="resultTime"><span class="mobiledes">BeginDate:</span>'.$result['Begindate'].'<span class="mobiledes">&nbsp;EndDate:</span>'.$result['Enddate'].'</div>';
 echo '<div class="resultAction"><span class="mobiledes">Add to wishlist</span>';
  switch($result['Eventstatus']){
                  case "1":
                        echo '<a target="_blank" href="pd-wishlist?id='.$result['Id'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></a></i>';
                        break;
                   case "2":
                        echo '<a target="_blank" href="pd-wishlist?id='.$result['Id'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></a></i>';
                        break;
                    case "3":
                        echo  "COURSE  FULL";
                        break;
                     case "4":
                        echo "Registration closed";
                        break;
                     default:
                       echo "none";
               }
 echo "</div>";
echo "</div>";

}?>
</div>
<?php 
/***********************bottom pagination****************/
    /********search result pagination*****/
                              
                                       if(isset($_GET["pagesize"])){       
                                               $numItem = $_GET["pagesize"];
                                           }
                                       else{
                                          $numItem = 5;
                                       }
					$numPage = intdiv(sizeof($_SESSION["searchResult"]),$numItem)+1;
                                     
                                     if(isset($_GET["page"])&&($_GET["page"]!=1)){   
                                              echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page=1&pagesize='.$numItem.'"><div class="Pagebutton"><<</div></a>';     
                                              $last = $_GET["page"]-1;
                                              echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$last .'&pagesize='.$numItem.'"><div class="Pagebutton"><</div></a>';          
                                       }
					for($i=1;$i<=$numPage;$i++){
					  			echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$i.'&pagesize='.$numItem.'"><div class="Pagebutton">'.$i.'</div></a>';
					}
										
					/********end search result pagination*******/
					if(isset($_GET["page"])){
					    $resultTemp = $_SESSION["searchResult"];
				           $numResult = ($_GET["page"]-1)*$numItem;
                                               $results = array_slice($resultTemp, $numResult,$numItem);
                                        }
                                        else{
					    $results = array_slice($results,0,$numItem); 
                                           $numResult = 0;
                                            echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page=2&pagesize='.$numItem.'"><div class="Pagebutton">></div></a>';      
					}
                                        
                                            if(isset($_GET["page"])&&($_GET["page"]!=$numPage)){   
                                               $next = $_GET["page"]+1;
                                               echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$next.'&pagesize='.$numItem.'"><div class="Pagebutton">></div></a>';                                        
				            }
                                            if(!isset($_GET["page"])||($_GET["page"]!=$numPage)){  
                                            echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$numPage.'&pagesize='.$numItem.'"><div class="Pagebutton">>></div></a>';  
                                           }     
               
                      /**************************************pagination functionality***************************/      

/**********************end bottom pagination************/
?>
<?php  /*******************************right item******************/?>
      <div class="pageSettingBottom"><p>Pagesize:</p><select id="pagesizebottom" name="pagesizebottom" onchange="pagesize(this)"><option value="1" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==5)){ echo "selected";  } ?>> 5 </option><option value="2" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==10)){ echo "selected";  }  ?>> 10 </option></select></div>
                           <div class="pageItemBottom"><p><span class="pageItemDes">Item </span><span class="pageItemDes"><?php  if(isset($_GET["page"])&&($_GET["page"]!=1)){ echo $numResult+1;} else{ echo "1";}  ?></span><span class="pageItemDes">to</span><span class="pageItemDes"><?php if((isset($_GET["page"])&&$_GET["page"]!=$numPage)||!isset($_GET["page"])){ echo $numResult+$numItem;} else{ echo $totalNum;} ?></span><span class="pageItemDes">of</span><span class="pageItemDes"><?php echo $totalNum;?></span></p></div>

<?php /*****************************end right item*************/?>
</div>

<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"><img alt="" src="/sites/default/files/SKINS%20280x600.png" style="width: 260px;" /></div>
 <script type="text/javascript">
              function pagesize(selectObject) {
                var value = selectObject.value;
                //var urls = "https://" + window.location.hostname + window.location.pathname;
                var urls = "http://" + window.location.hostname + ":" + window.location.port + window.location.pathname;
                var param = window.location.href.replace(urls ,"");

                //urls += "?" + paramPass;
              // urls = "http://10.2.1.190/apanew/pd/pd-search?";
             
                if(value== 1) {
                                window.location.href= urls + "?pagesize=5";
                } else {
                                window.location.href= urls + "?pagesize=10";
                }
                
}
               
                   
                        



</script>