<?php

function newSessionLogIn($id, $UserName, $Email, $FirstName, $LastName, $Title, $LinkId, $CompanyId, $TokenId, $Server, $Database, $AptifyUserID) {
	$_SESSION['Log-in'] = "in";
	$_SESSION['UserId'] = $id;
	$_SESSION['UserName'] = $UserName;
	$_SESSION['Email'] = $Email;
	$_SESSION['FirstName'] = $FirstName;
	$_SESSION['LastName'] = $LastName;
	$_SESSION['Title'] = $Title;
	$_SESSION['LinkId'] = $LinkId;
	$_SESSION['CompanyId'] = $CompanyId;
	$_SESSION['TokenId'] = $TokenId;
	$_SESSION['Server'] = $Server;
	$_SESSION['Database'] = $Database;
	$_SESSION['AptifyUserID'] = $AptifyUserID;
	// keep this session for half hour
	//$_SESSION['expireSessionTag'] = time() + (60 * 60 * 24 * 6);
	$_SESSION['expireSessionTag'] = time() + (60 * 59);
}
function newSessionStats($MemberTypeID, $MemberType, $Status, $Speciality, $payThroughDate, $nationGP) {
	$_SESSION['MemberTypeID'] = $MemberTypeID;
	$_SESSION['MemberType'] = $MemberType;
	$_SESSION['Status'] = $Status;
	$_SESSION['Speciality'] = $Speciality;
	$_SESSION['payThroughDate'] = $payThroughDate;
	$_SESSION['nationGP'] = $nationGP;
}
function nameUpdate($FirstName, $PrefName) {
	$_SESSION['FirstName'] = $FirstName;
	$_SESSION['Preferred-name'] = $PrefName;
}
function deleteSession() {
	// login related data
	unset($_SESSION['Log-in']);
	unset($_SESSION['UserId']);
	unset($_SESSION['UserName']);
	unset($_SESSION['Email']);
	unset($_SESSION['FirstName']);
	unset($_SESSION['LastName']);
	unset($_SESSION['Title']);
	unset($_SESSION['LinkId']);
	unset($_SESSION['CompanyId']);
	unset($_SESSION['TokenId']);
	unset($_SESSION['Server']);
	unset($_SESSION['Database']);
	unset($_SESSION['AptifyUserID']);
	unset($_SESSION['MemberTypeID']);
	unset($_SESSION['MemberType']);
	unset($_SESSION['Status']);
	unset($_SESSION['Speciality']);
	unset($_SESSION['payThroughDate']);
	// SSO data
	unset($_SESSION["outputReturn"]);
	unset($_SESSION["thirdParty"]);
	// user details' data
	//Added by JingHu
	unset($_SESSION["workplaceSettings"]);
	unset($_SESSION["interestAreas"]);
	unset($_SESSION["Language"]);
	unset($_SESSION['country']);
	unset($_SESSION['Dietary']);
	unset($_SESSION['QuatationTag']);
	completeOrderDeleteSession();
	//End Added by JingHu
	unset($_SESSION['Preferred-name']);
	unset($_SESSION['renewTag']);
	unset($_SESSION['expireTag']);
	unset($_SESSION['expireSessionTag']);
	/*
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	unset($_SESSION['Logfgh']);
	*/
}
/* Added by JingHu  */
/* When the order is created successfully delete all the session which are stored the temp data  */
function completeOrderDeleteSession(){
	unset($_SESSION["postReviewData"]);
	unset($_SESSION["tempcard"]);
	unset($_SESSION["MembershipProductID"]);
	unset($_SESSION["NationalProductID"]);
	unset($_SESSION["FPProductID"]);
	unset($_SESSION["MGProductID"]);
	unset($_SESSION['renewTag']);
	unset($_SESSION['expireTag']);
}
?>