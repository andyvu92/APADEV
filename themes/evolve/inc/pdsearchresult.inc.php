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
if(isset($_POST["lat"])) {	$request["Latitude"] = "";//$_POST["lat"];
} else { $request["Latitude"] = ""; }
if(isset($_POST["lng"])) {	$request["Longitude"] = "";//$_POST["lng"];
} else { $request["Longitude"] = ""; }
if(isset($_SESSION['UserID'])) { $sendData["UserID"] = $_SESSION['UserId'];
} else { $sendData["UserID"] = "-1"; }
if(isset($_POST["Radius"])) { $request["Radius"] = $_POST["Radius"];
} else { $request["Radius"] = ""; }
if(isset($_POST["Keywords"]) || isset($_GET["Keywords"])) {	
	if(isset($_POST["Keywords"])) {$request["Keyword"] = $_POST["Keywords"];}
	else {$request["Keyword"] = $_GET["Keywords"];}
} else { $request["Keyword"] = ""; }
if(isset($_POST["Typeofpd"])) {	$request["Typeofpd"] = $_POST["Typeofpd"];
} else { $request["Typeofpd"] = ""; }
if(isset($_POST["Nationalgp"]) || isset($_GET["Nationalgp"])) {	
	if(isset($_POST["Nationalgp"])) {$request["Nationalgp"] = $_POST["Nationalgp"];}
	else {$request["Nationalgp"] = $_GET["Nationalgp"];}
} else { $request["Nationalgp"] = ""; }
if(isset($_POST["Regionalgp"])) {	$request["Regionalgp"] = $_POST["Regionalgp"];
} else { $request["Regionalgp"] = ""; }
if(isset($_POST["State"]) || isset($_GET["State"])) {	
	if(isset($_POST["State"])) {$request["State"] = $_POST["State"];}
	else {$request["State"] = $_GET["State"];}
} else { $request["State"] = ""; }
if(isset($_POST["Suburb"]) || isset($_GET["Suburb"])) {	
	if(isset($_POST["Suburb"])) {$request["Suburb"] = $_POST["Suburb"];}
	else {$request["Suburb"] = $_GET["Suburb"];}
} else { $request["Suburb"] = ""; }
if(isset($_POST["BeginDate"]) || isset($_GET["BeginDate"])) {	
	if(isset($_POST["BeginDate"])) {$request["BeginDate"] = str_replace("-","/",$_POST["BeginDate"]);}
	else {$request["BeginDate"] = $_GET["BeginDate"];}
} else { $request["BeginDate"] = ""; }
if(isset($_POST["EndDate"]) || isset($_GET["EndDate"])) {	
	if(isset($_POST["EndDate"])) {$request["EndDate"] = str_replace("-","/",$_POST["EndDate"]);}
	else {$request["EndDate"] = $_GET["EndDate"];}
} else { $request["EndDate"] = ""; }
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

$outputEmpty = false;
if(isset($results['MResponse'])) {
	echo 'no record!!!';
	$outputEmpty = true;
} else {
	$totalNum = $results["MeetingDetails"][0]["PDcount"]; //sizeof($results);
	$results = $results["MeetingDetails"];
	$numItem = $request["PageSize"];
	$totalPage = intval($totalNum/$request["PageSize"]);
	if($totalNum % $request["PageSize"] > 0) {
		$totalPage++;
	}

	// page numbers control (Item N to N of Total)
	$itemPerPage = intval($numItem);
	$totalNumItems = intval($totalNum);
	$pageNfront = 1;
	$pageNum = 1;
	$pageNrear = ($itemPerPage * $pageNum);
	if($pageNrear > $totalNumItems) {
		$pageNrear = $totalNumItems;
	}
	if(isset($_GET["page"])) {
		$pageNum = intval($_GET["page"]);
		$pageNrear = ($itemPerPage * $pageNum);
		$pageNfront = 1 + ($itemPerPage * ($pageNum - 1));
		if($pageNrear > $totalNumItems) {
			$pageNrear = $totalNumItems;
		}
	}
}


//echo "totalnum: ".$totalNum;
//echo "totalpage: ".$totalPage;
?>

<h3 class="light-lead-heading align-center">PD BASED ON YOUR PROFILE</h3>
<?php if($outputEmpty): ?>
	<b stlye="text-align: center;">No result found!</b>
<?php else: ?>
<?php

   /********sort search result*****/
   /*
	usort($results, function($a, $b) {
		return $b['Begindate'] - $a['Begindate'];
	});
	******/ 
	
	$_SESSION["`searchResult`"] = $results;
	$passString = "";
	foreach($request as $reqt) {
		if($reqt != "") {
			$key = array_search($reqt, $request);
			if($key != "PageSize") {
				if($key != "PageNumber") {
					$passString = $passString.$key."=".$reqt."&";
				}
			}
		}
	}
	//echo "test1: ".$passString."<br >";
	//echo "test2: ".strlen($passString)."<br >";
	if(strlen($passString) > 1) {
		$passString = "&".substr($passString, 0, strlen($passString) - 1);
	}
	//echo "test3: ".$passString."<br >";
	//echo "test4: ".strlen($passString)."<br >";
	/******** search result pagination *****/
	
	if(isset($_GET["page"])) {
		$current = $_GET["page"];
	} else {
		$current = 1;
	}
	$max1 = $totalPage;
	$max = $totalNum;
	//echo "when current is: $current <br><br>";
	for($i = 0; $i < ($max / 10); $i++) {
		$front = (10 * $i);
		$back = 10 * ($i + 1) + 1;
		if($front < $current && $current <= ($back - 1)) {
			if($front == 0) {
				echo '<div class="pager col-xs-12 col-sm-6 col-md-7"><a href="'.$base_url.'/pd/pd-search?page=1&pagesize='.$numItem.$passString.'"><div class="Pagebutton"><<</div></a>';
			} else {
				echo '<div class="pager"><a href="'.$base_url.'/pd/pd-search?page='.$front.'&pagesize='.$numItem.$passString.'"><div class="Pagebutton"><<</div></a>';
			}
			if($current != 1) {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.($current - 1).'&pagesize='.$numItem.$passString.'"><div class="Pagebutton"><</div></a>';
			} else {
				echo '<a href="'.$base_url.'/pd/pd-search?page=1&pagesize='.$numItem.$passString.'"><div class="Pagebutton"><</div></a>';
			}
			for($j = 1;$j < 11; $j++) {
				$t = ($front + $j);
				if($t <= $max1) {
					if($t == $current) {
						echo '<div class="Pagebutton current">'.$t.'</div>';
					} else {
						echo '<a href="'.$base_url.'/pd/pd-search?page='.$t.'&pagesize='.$numItem.$passString.'"><div class="Pagebutton">'.$t.'</div></a>';
					}
				}
			}
			if($current != $max) {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.($current + 1).'&pagesize='.$numItem.$passString.'"><div class="Pagebutton">></div></a>';
			} else {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.$max.'&pagesize='.$numItem.$passString.'"><div class="Pagebutton">></div></a>';
			}
			if($back >= $max) {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.$max.'&pagesize='.$numItem.$passString.'"><div class="Pagebutton">>></div></a></div>';
			} else {
				echo '<a href="'.$base_url.'/pd/pd-search?page='.$back.'&pagesize='.$numItem.$passString.'"><div class="Pagebutton">>></div></a></div>';
			}
			break;
		}
		echo "<br><br>";
	}
	
	/********end search result pagination*******/

 ?>
 <div class="col-xs-12 col-sm-6 col-md-5 none-padding align-right page-size-setting">
	<div class="pageSetting"><p>Showing</p><select id="pagesize" name="pagesize" onchange="pagesize(this)"><option value="1" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==5)){ echo "selected";  } ?>> 5 </option><option value="2" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==10)){ echo "selected";  }  ?>> 10 </option><option value="3" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==20)){ echo "selected";  }  ?>> 20 </option></select><p> events</p></div>
	<div class="pageItem"><p><span class="pageItemDes">Item </span><span class="pageItemDes"><?php echo $pageNfront; ?></span><span class="pageItemDes">to</span><span class="pageItemDes"><?php echo $pageNrear; ?></span><span class="pageItemDes">of</span><span class="pageItemDes"><?php echo $totalNum;?></span></p></div>
</div>		
<?php              /**************************************pagination settings***************************/        ?>  
<div class="col-xs-12" style="padding:0;">
<div class="flex-container" id="pd-search-results">

    <div class="flex-cell flex-flow-row heading-row">
        <div class="flex-col-3">
            <span class="table-heading">Title</span>
        </div>
        <div class="flex-col-1">
            <span class="table-heading">Type</span>
        </div>
        <div class="flex-col-1">
            <span class="table-heading">CPD Hours</span>
        </div>
        <div class="flex-col-2">
            <span class="table-heading">City</span>
        </div>
        <div class="flex-col-2">
            <span class="table-heading">State</span>
        </div>
        <div class="flex-col-1">
            <span class="table-heading">Start date</span>
        </div>
        <div class="flex-col-1">
            <span class="table-heading">End date</span>
        </div>
        <div class="flex-col-1">
            <span class="table-heading">Status</span>
        </div>
    </div>

    <?php
	foreach($results as $result){

		echo "<div class='flex-cell flex-flow-row'>";
		echo	'<div class="flex-col-3">
					<span class="title"><a target="_blank" href="pd-product?id='.$result['MeetingID'].'">'.$result['Title']."</a></span>
					<div class='excerpt'><p>".$result['Description'].'</p></div>
					<span class="readmore"><a target="_blank" href="pd-product?id='.$result['MeetingID'].'"><span style="text-decoration:underline;">Tell me more</span></a></span>
				</div>';

        if(!empty($result['PDType'])) {
			echo	"<div class='flex-col-1'><span class='pd-header-mobile'>Type: </span>".$result['PDType']."</div>";
		} else {
			echo	"<div class='flex-col-1'><span class='pd-header-mobile'>Type: </span>N/A</div>";
		}

        if(!empty($result['CPDhours'])) {
			echo	"<div class='flex-col-1'><span class='pd-header-mobile'>CPD hours: </span>".$result['CPDhours'][0]['EducationUnits']."</div>";
		} else {
			echo	"<div class='flex-col-1'><span class='pd-header-mobile'>CPD hours: </span>N/A</div>";
		}

        if(!empty($result['City'])) {
			echo	"<div class='flex-col-2 pd-detail-city'><span class='pd-header-mobile'>City: </span>".$result['City']."</div>";
		} else {
			echo	"<div class='flex-col-2'><span class='pd-header-mobile'>City: </span>N/A</div>";
		}

		if(!empty($result['State'])) {
			echo	"<div class='flex-col-2'><span class='pd-header-mobile'>State: </span>".$result['State']."</div>";
		} else {
			echo	"<div class='flex-col-2'><span class='pd-header-mobile'>State: </span>N/A</div>";
		}

		if(!empty($result['StartDate'])) {
			$t = strtotime($result['StartDate']);
			echo	"<div class='flex-col-1'><span class='pd-header-mobile'>Start date: </span>".date("d M, Y",$t)."</div>";
		} else {
			echo	"<div class='flex-col-1'><span class='pd-header-mobile'>Start date: </span>N/A</div>";
		}

		if(!empty($result['EndDate'])) {
			$j = strtotime($result['EndDate']);
			echo	"<div class='flex-col-1'><span class='pd-header-mobile'>End date: </span>".date("d M, Y",$j)."</div>";
		} else {
			echo	"<div class='flex-col-1'><span class='pd-header-mobile'>End date: </span>N/A</div>";
		}
		
		echo	"<div class='flex-col-1 pd-status'>";
		$Totalnumber = doubleval($result['Totalnumber']);
		$Enrollednumber = doubleval($result['Enrollednumber']);
		$Div = $Enrollednumber/$Totalnumber;
		if($Div>=0.9 && $Div<1){
			echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['MeetingID'].'&pd_type='.$result['PDType'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></i><span>Almost full</span></a>';
		} elseif(($Totalnumber-$Enrollednumber)==0){
			echo  "<i class='fa fa-ban fa-lg' aria-hidden='true'></i><span>Course full</span>";
		} elseif($Div<0.9){
			echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['MeetingID'].'&pd_type='.$result['PDType'].'"><i class="fa fa-heart fa-lg" aria-hidden="true"></i><span>Open</span></a>';
		}
		echo	"</div>";
		echo "</div>";

	}
	?>	
</div>

<?php  /*******************************right item******************/?>
<div class="pager-bottom col-xs-12 col-sm-6 col-md-7 none-padding"></div>
<div class="col-xs-12 col-sm-6 col-md-5 none-padding align-right page-size-setting">
	<div class="pageSetting"><p>Showing</p><select id="pagesize" name="pagesize" onchange="pagesize(this)"><option value="1" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==5)){ echo "selected";  } ?>> 5 </option><option value="2" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==10)){ echo "selected";  }  ?>> 10 </option><option value="3" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==20)){ echo "selected";  }  ?>> 20 </option></select><p>events</p></div>
	<div class="pageItem"><p><span class="pageItemDes">Item </span><span class="pageItemDes"><?php echo $pageNfront; ?></span><span class="pageItemDes">to</span><span class="pageItemDes"><?php echo $pageNrear; ?></span><span class="pageItemDes">of</span><span class="pageItemDes"><?php echo $totalNum;?></span></p></div>
</div>
	<?php /*
	<div class="pageItemBottom"><p><span class="pageItemDes">Item </span><span class="pageItemDes"><?php  if(isset($_GET["page"])&&($_GET["page"]!=1)){ echo $totalNum+1;} else{ echo "1";}  ?></span><span class="pageItemDes">to</span><span class="pageItemDes"><?php if((isset($_GET["page"])&&$_GET["page"]!=$totalPage)||!isset($_GET["page"])){ echo $totalNum+$numItem;} else{ echo $totalNum;} ?></span><span class="pageItemDes">of</span><span class="pageItemDes"><?php echo $totalNum;?></span></p></div>
	*/ ?>
<?php /*****************************end right item*************/?>
</div>
<?php logRecorder(); ?>
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
		} else if(value== 2) {
						window.location.href= urls + "?pagesize=10";
		}
		else{
			window.location.href= urls + "?pagesize=20";
		}
                
	}
</script>
<?php endif; ?>