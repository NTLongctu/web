<?php
	require_once ("autoload/autoload.php");
	$key = intval(getInput('key'));
	$qty = intval(getInput('qty'));
	$product = $db->fetchID("product", $key);
	if($product['soluong'] >= $qty )
	{
		$_SESSION['cart'][$key]['qty'] = $qty;

		echo 1;
	}
	else
	{
		echo 2;
	}
	

?>