<?php
include __DIR__.'/AptifyAPI.inc.php';
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
	if($TypeAPI == "6" || $TypeAPI == "7" || $TypeAPI == "9" || $TypeAPI == "15" || $TypeAPI == "25" || $TypeAPI == "26" || $TypeAPI == "27" || $TypeAPI == "42") {
		$array = array();
		//$encriptionObject = new Encrption();
		foreach($ArrayIn as $key => $value) {
			// encrypt
			if($key == "Password") {
				$EncPass = encrypt_String($value);
				$array["Password"] = $EncPass;
			} elseif($key == "New_Password") {
				$EncPass = encrypt_String($value);
				$array["New_Password"] = $EncPass;
			} elseif($key == "Cardno") {
				$EncPass = encrypt_String($value);
				$array["Cardno"] = $EncPass;
			} elseif($key == "Expiry-date") {
				$EncPass = encrypt_String($value);
				$array["Expiry-date"] = $EncPass;
			} elseif($key == "CCV") {
				$EncPass = encrypt_String($value);
				$array["CCV"] = $EncPass;
			} elseif($key == "birth") {
				$EncPass = encrypt_String($value);
				$array["birth"] = $EncPass;
			} elseif($key == "Address_Line_1") {
				$EncPass = encrypt_String($value);
				$array["Address_Line_1"] = $EncPass;
			} elseif($key == "Card_number") {
				$EncPass = encrypt_String($value);
				$array["Card_number"] = $EncPass;
			} elseif($key == "CCNumber") {
				$EncPass = encrypt_String($value);
				$array["CCNumber"] = $EncPass;
			} elseif($key == "CCExpireDate") {
				$EncPass = encrypt_String($value);
				$array["CCExpireDate"] = $EncPass;
			} elseif($key == "CCSecurityNumber") {
				$EncPass = encrypt_String($value);
				$array["CCSecurityNumber"] = $EncPass;
			} else {
				$array[$key] = $value;
			}
		}
		$arrayToJson = JSONArrayConverter("toJSON", $array);
	}
	//echo "<br>".$TypeAPI."<br>";
	if($TypeAPI == "2" || $TypeAPI == "3" || $TypeAPI == "18" || $TypeAPI == "38") {
		return $jsonreturn[0];
	} else {
		logTransaction($jsonreturn[1],$arrayToJson,$jsonreturn[0]);
	}
	//var_dump($jsonreturn[0]);
    return JSONArrayConverter("toArray", $jsonreturn[0]);
	
	
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
	// search and remove line space \r\n and tabs \t
	// remove any empty space code to just a single space
	// remove any HEX color to 'black'
	$t = preg_replace("!\r?\n!", "", $json);
	$t = preg_replace("!\n!", "", $t);
	$t = preg_replace("!\t!", " ", $t);
	$t = preg_replace("/&nbsp;/", " ", $t);
	$t = preg_replace("/#[a-f0-9]{6}/i", "black", $t);
	$t = json_decode($t, $assoc);
	return $t;
}

function encrypt_String($inputString) {
	$key_size = 32; // 256 bits
	$encryption_key = openssl_random_pseudo_bytes($key_size, $strong);
	// $strong will be true if the key is crypto safe

	$iv_size = 16; // 128 bits
	$iv = openssl_random_pseudo_bytes($iv_size, $strong);
	$enc_name = openssl_encrypt(
		pkcs7_pad($inputString, 16), // padded data
		'AES-256-CBC',        // cipher and mode
		$encryption_key,      // secret key
		0,                    // options (not used)
		$iv                   // initialisation vector
	);
	return $enc_name;
}

function pkcs7_pad($data, $size) {
	$length = $size - strlen($data) % $size;
	return $data . str_repeat(chr($length), $length);
}
/*
class Encrption {
	private $key_size = 32; // 256 bits
	private $encryption_key = openssl_random_pseudo_bytes($key_size, $strong);
	// $strong will be true if the key is crypto safe

	private $iv_size = 16; // 128 bits
	private $iv = openssl_random_pseudo_bytes($iv_size, $strong);

	function encrypt_String($inputString) {
		$enc_name = openssl_encrypt(
			pkcs7_pad($inputString, 16), // padded data
			'AES-256-CBC',        // cipher and mode
			$this->$encryption_key,      // secret key
			0,                    // options (not used)
			$this->$iv                   // initialisation vector
		);
		return $enc_name;
	}
	
	private function pkcs7_pad($data, $size) {
		$length = $size - strlen($data) % $size;
		return $data . str_repeat(chr($length), $length);
	}
}
*/
?>