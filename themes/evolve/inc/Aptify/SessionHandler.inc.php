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
	// user details' data
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
?>