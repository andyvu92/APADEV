<?php
function getMemberTypePrice(){
    // 2.2.31 Get Membership prodcut price
    // Send - 
    // userID & product list
    // Response -Membership prodcut price
    $prodcutArray = array();
    $memberProductsArray['ProductID']=$prodcutArray;
    $memberProdcutID = $memberProductsArray;
    $MemberType = GetAptifyData("31", $memberProdcutID);
    //print_r($MemberType);
    // write Country json file
	foreach($MemberType as $key => $value){
        $x = explode(" ", $MemberType[$key]['Title']);
        $y = str_replace(":", "", $x[0]);
        $z = str_replace($x[0]." ", "", $MemberType[$key]['Title']);
        $ID = $MemberType[$key]['ProductID'];
        $code = $y;
        $Title = $z;
		$Price = $MemberType[$key]['Price'];
		$arrayCountry[] = array('ID'=>$ID, 'Title'=>$Title, 'Price'=>$Price, 'Code'=>$code);	
    }
	$response= $arrayCountry;
	$fp = fopen(__DIR__ . '/../json/TypePrice.json', 'w');
    $test = fwrite($fp, json_encode($response));
    fclose($fp);
}
getMemberTypePrice();
?>