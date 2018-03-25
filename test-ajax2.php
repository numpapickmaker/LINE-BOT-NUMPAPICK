<?php
	/*** By Weerachai Nukitram ***/
	/***  http://www.ThaiCreate.Com ***/

	session_start();

	$strUsername = trim($_POST["tUsername"]);
	$strPassword = trim($_POST["tPassword"]);
	
	//*** Check Username ***//
	if(trim($strUsername) == "")
	{
		echo "<font color=red>**</font> Plase input [Username]";
		exit();
	}
	
	//*** Check Password ***//
	if(trim($strPassword) == "")
	{
		echo "<font color=red>**</font> Plase input [Password]";
		exit();
	}
	

	$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
	$objDB = mysql_select_db("mydatabase");


	//*** Check Username & Password ***//

	$strSQL = "SELECT * FROM account WHERE Username = '".$strUsername."' and Password = '".$strPassword."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo "Y";

		//*** Session ***//
		$_SESSION["Username"] = $strUsername;
		session_write_close();
	}
	else
	{
		echo "<font color=red>**</font> Username & Password is wrong";
	}

	mysql_close($objConnect);
?>
