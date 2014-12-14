<?php


function encryptPassword($password) {

	$randomString = substr(md5(uniqid("", true)),0,22);
	$randomNum = rand(4,10);
	if($randomNum < 10) {
		$randomNum = "0".$randomNum;
	}
	
	$strSalt = "$2a$".$randomNum."$".$randomString;
	$encryptPassword = crypt($password, $strSalt);
	
	$returnArr = array("password" => $encryptPassword, "salt" => $strSalt);
	
	return $returnArr;
	
}

?>