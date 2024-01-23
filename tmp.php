<?php
	require_once ("autoload/autoload.php");
	
	$product = $db->fetchID("product", 5);
	if($product['soluong']> 49)
	{
		echo intval($product['soluong']);
	}
	
?>