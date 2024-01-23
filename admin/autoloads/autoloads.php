<?php
	session_start();
	require_once ("../../../libraries/Database.php");
	require_once ("../../../libraries/Function.php");
	$db = new Database ;

	if(! isset($_SESSION['admin_id'])
	{
		header("location: /WebBanSach/login/");
	}

	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/WebBanSach/public/uploads/");
?>