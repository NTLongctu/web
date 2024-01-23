<?php 
	require_once ("autoload/autoload.php");
	$id = intval(getInput('id'));
	unset($_SESSION['cart'][$id]);
	if($_SESSION['cart'] < 0)
	{
		unset($_SESSION['cart']);
	}
	$_SESSION['success'] = "Xóa sản phẩm thành công!";
	header("location:viewcart.php");

?>