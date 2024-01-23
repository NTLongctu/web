<?php
	require_once ("autoload/autoload.php");
	if(! isset($_SESSION['name_id']))
	{
		echo "<script>alert('Bạn chưa đăng nhập!');location.href='login.php' </script>";
	}

	$id = intval(getInput('id'));
	
	$product = $db->fetchID("product", $id);
	$tacgia = $db->fetchID("tacgia",$product['id_tacgia'] );
	
	if(!isset($_SESSION['cart'][$id]))
	{
		$_SESSION['cart'][$id]['name'] = $product['name'];
		$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
		$_SESSION['cart'][$id]['qty'] = 1;
		$_SESSION['cart'][$id]['sale'] = $product['sale'];
		$_SESSION['cart'][$id]['price'] = $product['price'];
		$_SESSION['cart'][$id]['nametacgia'] = $tacgia['name'];
		$_SESSION['cart'][$id]['pricesale'] = ((100-$product['sale'])*$product['price'])/100;
	}
	else
	{
		$_SESSION['cart'][$id]['qty'] +=1;
	}

	echo "<script>alert('Thêm sản phẩm thành công!');location.href='index.php' </script>";
?>