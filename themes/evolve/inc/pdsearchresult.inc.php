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
if(isset($_POST["Keywords"])) {	$request["Keyword"] = $_POST["Keywords"];
} else { $request["Keyword"] = ""; }
if(isset($_POST["Typeofpd"])) {	$request["Typeofpd"] = $_POST["Typeofpd"];
} else { $request["Typeofpd"] = ""; }
if(isset($_POST["Nationalgp"])) {	$request["Nationalgp"] = $_POST["Nationalgp"];
} else { $request["Nationalgp"] = ""; }
if(isset($_POST["Regionalgp"])) {	$request["Regionalgp"] = $_POST["Regionalgp"];
} else { $request["Regionalgp"] = ""; }
if(isset($_POST["State"])) {	$request["State"] = $_POST["State"];
} else { $request["State"] = ""; }
if(isset($_POST["Suburb"])) {	$request["Suburb"] = $_POST["Suburb"];
} else { $request["Suburb"] = ""; }
if(isset($_POST["Begindate"])) {	$request["Begindate"] = str_replace("-","/",$_POST["Begindate"]);
} else { $request["Begindate"] = ""; }
if(isset($_POST["Enddate"])) {	$request["Enddate"] = $_POST["Enddate"];
} else { $request["Enddate"] = ""; }
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

$totalNum = $results["MeetingDetails"][0]["PDcount"]; //sizeof($results);
$results = $results["MeetingDetails"];
$numItem = $request["PageSize"];
$totalPage = intval($totalNum/$request["PageSize"]);
if($totalNum % $request["PageSize"] > 0) {
	$totalPage++;
}
	
?>

<h3 class="light-lead-heading align-center">PD BASED ON YOUR PROFILE</h3>
<?php

   /********sort search result*****/
   /*
	usort($results, function($a, $b) {
		return $b['Begindate'] - $a['Begindate'];
	});
	******/ 
	
	$_SESSION["`searchResult`"] = $results;

	/******** search result pagination *****/
	
	if(isset($_GET["page"])) {
		$current = $_GET["page"];
	} else {
		$current = 1;
	}
	$max = $totalNum;
	//echo "when current is: $current <br><br>";
	for($i = 0; $i < ($max / 10); $i++) {
		$front = (10 * $i);
		$back = 10 * ($i + 1) + 1;
		if($front < $current && $current <= ($back - 1)) {
			if($front == 0) {
				echo '<div class="pager col-xs-12 col-sm-6 col-md-9"><a href="'.$base_url.'/pd/pd-search?page=1&pagesize='.$numItem.'"><div class="Pagebutton"><<</div></a>';
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
						echo '<div class="Pagebutton current">'.$t.'</div>';
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
 <div class="col-xs-12 col-sm-6 col-md-3 none-padding align-right">
	<div class="pageSetting"><p>Pagesize:</p><select id="pagesize" name="pagesize" onchange="pagesize(this)"><option value="1" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==5)){ echo "selected";  } ?>> 5 </option><option value="2" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==10)){ echo "selected";  }  ?>> 10 </option></select></div>
	<div class="pageItem"><p><span class="pageItemDes">Item </span><span class="pageItemDes"><?php  if(isset($_GET["page"])&&($_GET["page"]!=1)){ echo $numItem;} else{ echo "1";}  ?></span><span class="pageItemDes">to</span><span class="pageItemDes"><?php if((isset($_GET["page"])&&$_GET["page"]!=$totalPage)||!isset($_GET["page"])){ echo $numItem;} else{ echo $totalNum;} ?></span><span class="pageItemDes">of</span><span class="pageItemDes"><?php echo $totalNum;?></span></p></div>
</div>		
<?php              /**************************************pagination settings***************************/        ?>  
<div class="col-xs-12" style="padding:0;">
<div class="flex-container">

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
        <div class="flex-col-1">
            <span class="table-heading">City</span>
        </div>
        <div class="flex-col-1">
            <span class="table-heading">State</span>
        </div>
        <div class="flex-col-2">
            <span class="table-heading">Begin date</span>
        </div>
        <div class="flex-col-2">
            <span class="table-heading">End date</span>
        </div>
        <div class="flex-col-1">
            <span class="table-heading">Add to wishlist</span>
        </div>
    </div>

    <?php
	foreach($results as $result){

		echo "<div class='flex-cell flex-flow-row'>";
		echo	'<div class="flex-col-3">
					<span class="title"><a target="_blank" href="pd-product?id='.$result['MeetingID'].'">'.$result['Title']."</a></span>
					<div class='excerpt'><p>".$result['Description'].'</p></div>
					<span class="readmore"><a target="_blank" href="pd-product?id='.$result['MeetingID'].'"><span style="text-decoration:underline;">Read more</span></a></span>
				</div>';

        if(!empty($result['PDType'])) {
			echo	"<div class='flex-col-1'>".$result['PDType']."</div>";
		} else {
			echo	"<div class='flex-col-1'>N/A</div>";
		}

        if(!empty($result['CPDhours'])) {
			echo	"<div class='flex-col-1'>".$result['CPDhours'][0]."</div>";
		} else {
			echo	"<div class='flex-col-1'>N/A</div>";
		}

        if(!empty($result['City'])) {
			echo	"<div class='flex-col-1'>".$result['City']."</div>";
		} else {
			echo	"<div class='flex-col-1'>N/A</div>";
		}

		if(!empty($result['State'])) {
			echo	"<div class='flex-col-1'>".$result['State']."</div>";
		} else {
			echo	"<div class='flex-col-1'>N/A</div>";
		}

		if(!empty($result['StartDate'])) {
			echo	"<div class='flex-col-2'>".$result['StartDate']."</div>";
		} else {
			echo	"<div class='flex-col-2'>N/A</div>";
		}

		if(!empty($result['EndDate'])) {
			echo	"<div class='flex-col-2'>".$result['EndDate']."</div>";
		} else {
			echo	"<div class='flex-col-2'>N/A</div>";
		}
		
		echo	"<div class='flex-col-1'>";
		$gap = intval($result['Totalnumber']) - intval($result['Enrollednumber']);
		$tenP = intval($result['Totalnumber'])/10;
		if($gap == 0) {
			echo  "COURSE  FULL";
		} elseif($gap < $tenP) {
			echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['MeetingID'].'&pd_type='.$result['PDType'].'"><i class="fa fa-heart fa-lg" aria-hidden="true">Almost full</a></i>';
		} else {
			echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['MeetingID'].'&pd_type='.$result['PDType'].'"><i class="fa fa-heart fa-lg" aria-hidden="true">Open</a></i>';
		}
		echo	"</div>";
		echo "</div>";

	}
	?>	
</div>

<div class="resultMobile">
<?php foreach($results as $result){
echo '<div class="resultDisplay">';
echo '<div class="resultTitle"><span class="mobiledes">Title:</span><a target="_blank" href="pd-product?id='.$result['MeetingID'].'">'.$result['Title']."</a><br>".$result['Description'].'<br><a target="_blank" href="pd-product?id='.$result['MeetingID'].'"><span style="text-decoration:underline;">Read more</span></a></div>';
if(isset($result['CPDhours'])) {
	echo '<div class="resultType"><span class="mobiledes">Type:</span>'.$result['PDType'].'&nbsp;<span class="mobiledes">CPD HRS:</span>?</div>';
} else {
	echo '<div class="resultType"><span class="mobiledes">Type:</span>'.$result['PDType'].'&nbsp;<span class="mobiledes">CPD HRS:</span>'.$result['CPDhours'].'</div>';
}
echo '<div class="resultState"><span class="mobiledes">City:</span>'.$result['City'].'&nbsp;<span class="mobiledes">State:</span>'.$result['State'].'</div>';
echo '<div class="resultTime"><span class="mobiledes">BeginDate:</span>'.$result['StartDate'].'<span class="mobiledes">&nbsp;EndDate:</span>'.$result['EndDate'].'</div>';
echo '<div class="resultAction"><span class="mobiledes">Add to wishlist</span>';
$gap = intval($result['Totalnumber']) - intval($result['Enrollednumber']);
$tenP = intval($result['Totalnumber'])/10;
if($gap == 0) {
	echo  "COURSE  FULL";
} elseif($gap < $tenP) {
	echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['MeetingID'].'&pd_type='.$result['PDType'].'"><i class="fa fa-heart fa-lg" aria-hidden="true">Almost full</a></i>';
} else {
	echo '<a target="_blank" href="pd-wishlist?source=PD&create&id='.$result['MeetingID'].'&pd_type='.$result['PDType'].'"><i class="fa fa-heart fa-lg" aria-hidden="true">Open</a></i>';
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
<div class="pager-bottom col-xs-12 col-sm-6 col-md-9"></div>
<div class="col-xs-12 col-sm-6 col-md-3 none-padding align-right">
	<div class="pageSetting"><p>Pagesize:</p><select id="pagesize" name="pagesize" onchange="pagesize(this)"><option value="1" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==5)){ echo "selected";  } ?>> 5 </option><option value="2" <?php  if(isset($_GET["pagesize"])&&($_GET["pagesize"]==10)){ echo "selected";  }  ?>> 10 </option></select></div>
	<div class="pageItem"><p><span class="pageItemDes">Item </span><span class="pageItemDes"><?php  if(isset($_GET["page"])&&($_GET["page"]!=1)){ echo $numItem;} else{ echo "1";}  ?></span><span class="pageItemDes">to</span><span class="pageItemDes"><?php if((isset($_GET["page"])&&$_GET["page"]!=$totalPage)||!isset($_GET["page"])){ echo $numItem;} else{ echo $totalNum;} ?></span><span class="pageItemDes">of</span><span class="pageItemDes"><?php echo $totalNum;?></span></p></div>
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
		} else {
						window.location.href= urls + "?pagesize=10";
		}
                
	}
</script>