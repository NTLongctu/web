<?php
	session_start();
	require_once ("libraries/Database.php");
	require_once ("libraries/Function.php");
	$db = new Database ;

	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/WebBanSach/public/uploads/");
	$category = $db->fetchAll("category");

	

	//lấy danh sách sản phẩm mới
	$sqlproductNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
	$productNew = $db->fetchsql($sqlproductNew); 
	$sqlproductHot = "SELECT * FROM product WHERE hot = 1 ORDER BY ID LIMIT 3";
	$productHot = $db->fetchsql($sqlproductHot);

?>