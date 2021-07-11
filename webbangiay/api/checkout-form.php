<?php

require_once "../DB/dbhelper.php";
require_once "../common/utility.php";

require_once "cookie.php";

if(!empty($_POST)) {
	$cart = [];
	if(isset($_COOKIE['cart'])) {
		$json = $_COOKIE['cart'];
		$cart = json_decode($json, true);
	}
	if($cart ==null || count($cart) == 0) {
		header('Location: ./user');
		die();
	}

	$fullname = getPost('fullname');
	$email = getPost('email');
	$phone_number = getPost('phone_number');
	$address = getPost('address');
	$orderDate = date('Y-m-d H:i:s');

	//add order
	$sql = "insert into donhang(fullname, address, phone_number, order_date, email) values ('$fullname', '$address', '$phone_number', '$orderDate', '$email')";
	execute($sql);

// add order_detail

	$sql = "select * from donhang where order_date = '$orderDate'";
	$order = executeSingleResult($sql);

	$orderId = $order['id'];

	$idList = [];
	foreach ($cart as $item) {
		$idList[] = $item['id'];
	}
	if(count($idList) > 0) {
		$idList = implode(',', $idList);
		//[2, 5, 6] => 2,5,6
		$sql = "select * from sanpham where id in ($idList)";
		$cartList = executeResult($sql);
	} else {
		$cartList = [];
	}

	foreach ($cartList as $item) {
		$num = 0;
		foreach ($cart as $value) {
			if($value['id'] == $item['id']) {
				$num = $value['num'];
				break;
			}
		}

		$sql = "insert into chitietdonhang(order_id, product_id, num, price) values ($orderId, ".$item['id'].", $num, ".$item['gia']*$num.")";
		execute($sql);
	}

	header('Location: complete.php');
	setcookie('cart', '[]', time()-1000, '/');
}

?>
