<?php
global $base_url;
// todo
// This will only be displayed when there is any results.

// 2.2.28 - GET event search result list
// It has four different cases, but we are going to use
// only one scenario 
// 1. Nothing is given (default)
// 2. State only
// 3. Lat, Lng only
// 4. All of information is given
// Send - 
// Latitude, Longitude, userID, Radius, Keywords, Type of PD
// National Group, Regional Group, State, Suburb, Begin date
// End date, Page size, Page number
// Response -
// PDcount,
// [ PD id, PD title, PD type, CPD hour, City, State,
// Begin date, End date ]
$request["Latitude"] = "";
$request["Longitude"] = "";
$request["userID"] = "";
$request["Radius"] = "";
$request["Keywords"] = "";
$request["Typeofpd"] = "";
$request["Nationalgp"] = "";
$request["Regionalgp"] = "";
$request["State"] = "";
$request["Suburb"] = "";
$request["Begindate"] = "";
$request["Enddate"] = "";
if(isset($_GET["pagesize"])) {
	$request["PageSize"] = $_GET["pagesize"];
} else { // default page size
	$request["PageSize"] = "5";
}
if(isset($_GET["page"])) {
	$request["PageNumber"] = $_GET["page"];
} else { // default page number
	$request["PageNumber"] = "1";
}
$results = GetAptifyData("28", $request);
echo "result:<br>";
print_r($results);

$totalNum = $results["MeetingDetails"][0]["PDcount"]; //sizeof($results);
$results = $results["MeetingDetails"];
$numItem = $request["PageSize"];
$totalPage = intval($totalNum/$request["PageSize"]);
if($totalNum % $request["PageSize"] > 0) {
	$totalPage++;
}
	
?>

<h3>PD BASED ON YOUR PROFILE</h3>
<?php

   /********sort search result*****/
   /*
	usort($results, function($a, $b) {
		return $b['Begindate'] - $a['Begindate'];
	});
	******/ 
	
	$_SESSION["searchResult"] = $results;

	/******** search result pagination *****/
	
	if(isset($_GET["page"])) {
		$current = $_GET["page"];
	} else {
		$current = 1;
	}
	$max = $totalNum;
	echo "when current is: $current <br><br>";
	for($i = 0; $i < ($max / 10); $i++) {
		$front = (10 * $i);
		$back = 10 * ($i + 1) + 1;
		if($front < $current && $current <= ($back - 1)) {
			if($front == 0) {
				echo '<div class="pager"><a href="'.$base_url.'/pd/pd-search?page=1&pagesize='.$numItem.'"><div class="Pagebutton"><<</div></a>';
			} else {
				echo '<div class="pager"><a href="'.$base_url.'/pd/pd-search?page='.$front.'&pagesize='.$numItem.'"><div class="Pagebutton"><<</div></a>';
			}
			if($current != 1) {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.($current - 1).'&pagesize='.$numItem.'"><div class="Pagebutton"><</div></a>';
			} else {
				echo '<a href="'.$base_url.'/pd/pd-search?page=1&pagesize='.$numItem.'"><div class="Pagebutton"><</div></a>';
			}
			for($j = 1;$j < 11; $j++) {
				$t = ($front + $j);
				if($t <= $max) {
					if($t == $current) {
						echo '<<div class="Pagebutton current">'.$t.'</div>';
					} else {
						echo '<a href="'.$base_url.'/pd/pd-search?page='.$t.'&pagesize='.$numItem.'"><div class="Pagebutton">'.$t.'</div></a>';
					}
				} 
			}
			if($current != $max) {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.($current + 1).'&pagesize='.$numItem.'"><div class="Pagebutton">></div></a>';
			} else {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.$max.'&pagesize='.$numItem.'"><div class="Pagebutton">></div></a>';
			}
			if($back >= $max) {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.$max.'&pagesize='.$numItem.'"><div class="Pagebutton">>></div></a></div>';
			} else {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.$back.'&pagesize='.$numItem.'"><div class="Pagebutton">>></div></a></div>';
			}
			break;
		}
		echo "<br><br>";
	}
	
	/********end search result pagination*******/

 ?>
<div class="pageSetting"><p>Pagesize:</p><select id="pagesize" name="pagesize" onchange="pagesize(this)"><option value="1" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==5)){ echo "selected";  } ?>> 5 </option><option value="2" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==10)){ echo "selected";  }  ?>> 10 </option></select></div>
<div class="pageItem"><p><span class="pageItemDes">Item </span><span class="pageItemDes"><?php  if(isset($_GET["page"])&&($_GET["page"]!=1)){ echo $numItem;} else{ echo "1";}  ?></span><span class="pageItemDes">to</span><span class="pageItemDes"><?php if((isset($_GET["page"])&&$_GET["page"]!=$totalPage)||!isset($_GET["page"])){ echo $numItem;} else{ echo $totalNum;} ?></span><span class="pageItemDes">of</span><span class="pageItemDes"><?php echo $totalNum;?></span></p></div>
        <?php              /**************************************pagination settings***************************/        ?>  
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="padding:0;">
<table class="table table-responsive resultTable">
	<tbody>
		<tr>
			<th>TITLE</th>
			<th>CPD HRS</th>
			<th>TYPE</th>
			<th>CITY</th>
			<th>STATE</th>
			<th>BEGIN DATE</th>
			<th>END DATE</th>
			<th>ADD TO WISHLIST</th>
		</tr>
         
	<?php
	foreach($results as $result){

		echo "<tr>";
		echo	'<td><a target="_blank" href="pd-product?id='.$result['MeetingID'].'">'.$result['Title']."</a><br>".$result['Summary'].'<br><a target="_blank" href="pd-product?id='.$result['MeetingID'].'"><span style="text-decoration:underline;">Read more</span></a></td>';
		echo	"<td>".$result['PDType']."</td>";
		echo	"<td>".$result['CPDhours']."</td>";
		echo	"<td>".$result['City']."</td>";
		echo	"<td>".$result['State']."</td>";
		echo	"<td>".$result['StartDate']."</td>";
		echo	"<td>".$result['EndDate']."</td>";
		echo	"<td>";
		switch($result['Eventstatus']){
			case "1":
				echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['MeetingID'].'&pd_type='.$result['PDType'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></a></i>';
				break;
			case "2":
				echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['MeetingID'].'&pd_type='.$result['PDType'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></a></i>';
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
		echo	"</td>";
		echo "</tr>";

	}
	?>	
	</tbody>
</table>

<div class="resultMobile">
<?php foreach($results as $result){
echo '<div class="resultDisplay">';
echo '<div class="resultTitle"><span class="mobiledes">Title:</span><a target="_blank" href="pd-product?id='.$result['MeetingID'].'">'.$result['Title']."</a><br>".$result['Summary'].'<br><a target="_blank" href="pd-product?id='.$result['MeetingID'].'"><span style="text-decoration:underline;">Read more</span></a></div>';
echo '<div class="resultType"><span class="mobiledes">Type:</span>'.$result['PDType'].'&nbsp;<span class="mobiledes">CPD HRS:</span>'.$result['CPDhours'].'</div>';
echo '<div class="resultState"><span class="mobiledes">City:</span>'.$result['City'].'&nbsp;<span class="mobiledes">State:</span>'.$result['State'].'</div>';
echo '<div class="resultTime"><span class="mobiledes">BeginDate:</span>'.$result['StartDate'].'<span class="mobiledes">&nbsp;EndDate:</span>'.$result['EndDate'].'</div>';
echo '<div class="resultAction"><span class="mobiledes">Add to wishlist</span>';
switch($result['Eventstatus']){
	case "1":
		echo '<a target="_blank" href="pd-wishlist?id='.$result['MeetingID'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></a></i>';
		break;
	case "2":
		echo '<a target="_blank" href="pd-wishlist?id='.$result['MeetingID'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></a></i>';
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
	/*
	if(isset($_GET["pagesize"])){       
		$numItem = $_GET["pagesize"];
	} else {
		$numItem = 5;
	}
	//$numPage = intdiv(sizeof($_SESSION["searchResult"]),$numItem)+1;
	if(isset($_GET["page"])&&($_GET["page"]!=1)){   
		echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page=1&pagesize='.$numItem.'"><div class="Pagebutton"><<</div></a>';     
		$last = $_GET["page"]-1;
		echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$last .'&pagesize='.$numItem.'"><div class="Pagebutton"><</div></a>';          
	}
	for($i=1;$i<=$totalPage;$i++){
		echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$i.'&pagesize='.$numItem.'"><div class="Pagebutton">'.$i.'</div></a>';
	}
										
	/********end search result pagination*******/
	/*
	if(isset($_GET["page"])){
		$resultTemp = $_SESSION["searchResult"];
		$numResult = ($_GET["page"]-1)*$numItem;
		$results = array_slice($resultTemp, $numResult,$numItem);
	} else {
		$results = array_slice($results,0,$numItem); 
		$numResult = 0;
		echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page=2&pagesize='.$numItem.'"><div class="Pagebutton">></div></a>';      
	}
                                        
	if(isset($_GET["page"])&&($_GET["page"]!=$totalPage)){   
		$next = $_GET["page"]+1;
		echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$next.'&pagesize='.$numItem.'"><div class="Pagebutton">></div></a>';                                        
	}
	if(!isset($_GET["page"])||($_GET["page"]!=$totalPage)){  
		echo '<a target="_self" href="'.$base_url.'/pd/pd-search?page='.$totalPage.'&pagesize='.$numItem.'"><div class="Pagebutton">>></div></a>';  
	}     
               
	/****************pagination functionality********************/      

/**********************end bottom pagination************/
?>
<?php  /*******************************right item******************/?>
	<div class="pageSettingBottom"><p>Pagesize:</p><select id="pagesizebottom" name="pagesizebottom" onchange="pagesize(this)"><option value="1" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==5)){ echo "selected";  } ?>> 5 </option><option value="2" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==10)){ echo "selected";  }  ?>> 10 </option></select></div>
	<div class="pageItemBottom"><p><span class="pageItemDes">Item </span><span class="pageItemDes"><?php  if(isset($_GET["page"])&&($_GET["page"]!=1)){ echo $numResult+1;} else{ echo "1";}  ?></span><span class="pageItemDes">to</span><span class="pageItemDes"><?php if((isset($_GET["page"])&&$_GET["page"]!=$totalPage)||!isset($_GET["page"])){ echo $numResult+$numItem;} else{ echo $totalNum;} ?></span><span class="pageItemDes">of</span><span class="pageItemDes"><?php echo $totalNum;?></span></p></div>
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
	  // urls = "/pd/pd-search?";
	 
		if(value== 1) {
						window.location.href= urls + "?pagesize=5";
		} else {
						window.location.href= urls + "?pagesize=10";
		}
                
	}
</script>