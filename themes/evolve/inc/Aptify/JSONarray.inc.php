<?php
include('sites/all/themes/evolve/inc/Aptify/AptifyAPI.inc.php');

/**
 *  GetData, whichever form they are.
 *  open to public
 */
function GetAptifyData($TypeAPI, $ArrayIn) {
	// Array to JSON
	$arrayToJson = JSONArrayConverter("toJSON", $ArrayIn);
	// pass array and JSON version together and use them as needed.
	$jsonreturn = AptifyAPI($TypeAPI, $ArrayIn, $arrayToJson);
	if($TypeAPI == "10") {
		//echo $jsonreturn;
	/*	
	echo "<br><br><br><br>";
	$image = new \imagick($jsonreturn);
	header("Content-Type: image/jpg");
	echo $image->getImageBlob();
	echo "<br><br><br><br>";
	$fp = fopen(__DIR__ . '/../json/image.png', 'X');
    $test = fwrite($fp, $jsonreturn);
	var_dump($test);
	fclose($fp);
	*/
	}
	echo "<br>".$TypeAPI."<br>";
	if($TypeAPI == "2" || $TypeAPI == "3" || $TypeAPI == "18" || $TypeAPI == "38") {
		return $jsonreturn;
	} else {
		logTransaction($TypeAPI,$arrayToJson,$jsonreturn);
	}
    return JSONArrayConverter("toArray", $jsonreturn);
}


/**
 *  Conversion begin!
 *  Private function
 */
function JSONArrayConverter($type, $Input) {
	if($type == "toArray") {
		return $results = json_clean_decode($Input, true);
	} else {
		return $results = json_encode($Input, true);
	}
}
function json_clean_decode($json, $assoc = false, $depth = 512, $options = 0) {
	// search and remove line space \r\n
	$json = preg_replace("!\r?\n!", "", $json);
	$json = json_decode($json, $assoc);
	return $json;
}

function logTransaction($APINum, $Sent, $Got) {
	$sizeByte = intval(filesize("sites/Log/APA_Aptify_Communication.log"));
	$size = FileSizeConvert($sizeByte);
	//echo "size: ".$size." // ".filesize("sites/Log/APA_Aptify_Communication.log")."<br />";
	if($sizeByte > 100000) {
		fileloop();
	}
	$fileContinue = "";
	if(file_exists("sites/Log/APA_Aptify_Communication.log")){ // Check If File Already Exists
		$myfilet = fopen("sites/Log/APA_Aptify_Communication.log", "r");
		$fileContinue = fread($myfilet,filesize("sites/Log/APA_Aptify_Communication.log"));
		//echo "Yo: ".$fileContinue."!<br />";
		fclose($myfilet);
	}
	//echo "<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>";
	//echo $fileContinue;
	//echo "<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>";
	$myfile = fopen("sites/Log/APA_Aptify_Communication.log", "w");
	// log:
	// UserID, Date/Time, Data Sent,
	// Data Received, Web service Number
	fwrite($myfile, $fileContinue);
	$txt = "UserID: ";
	if(isset($_SESSION["UserId"])) {$txt .= $_SESSION["UserId"]."\n";} else {$txt .= "Null\n";}
	$txt .= "Date/time: ".date("Y-m-d h-i-s")."\n";
	$txt .= "Web Service No: ".$APINum."\n";
	$txt .= "Date Sent: \n";
	$txt .= $Sent."\n";
	$txt .= "Data Received: \n";
	$txt .= $Got."\n";
	$txt .= "---End of Log (".date("Y-m-d h-i-s").")---\n\n\n\n\n";
	//echo $txt;
	fwrite($myfile, $fileContinue.$txt);
	fclose($myfile);
	// log file output.
}

// push file names' number increased by 1.
function fileloop() {
	$num = count(scandir('sites/Log/')) - 2;
	$arrayT = array();
	if($handle = opendir('sites/Log/')) {
		while (false !== ($fileName = readdir($handle))) {
			array_push($arrayT, $fileName);			
		}
		closedir($handle);
	}
	arsort($arrayT);
	foreach($arrayT as $fileName) {
		if(strlen($fileName) > 2 ) {
			//echo $fileName." - iiiinnnnn!!!<br />";
			if($fileName == "APA_Aptify_Communication.log") {
					$newName = $newName = str_replace("APA_Aptify_Communication.log","APA_Aptify_Communication1.log",$fileName);
				} else {
					$newName = str_replace((string)($num - 1),(string)$num,$fileName);
				}
				$num--;
				//echo "new Name: ".$newName."<br />";
			if(!file_exists("sites/Log/".$newName)){ // Check If File Already Exists
				if(rename("sites/Log/".$fileName, "sites/Log/".$newName)){ // Check If rename Function Completed Successfully
					//echo "Successfully Renamed $fileName to $newName<br />" ;
				}else{
					//echo "There Was Some Error While Renaming $fileName<br />" ;
				}
			}else{
				//echo "A File With The New File Name Already Exists<br />" ;
			}
		}
	}
}


/** 
* Converts bytes into human readable file size. 
* 
* @param string $bytes 
* @return string human readable file size (2,87 Мб)
* @author Mogilev Arseny 
*/
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
?>