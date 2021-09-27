<?php

session_start();
include 'config.php';
/*
function query($query) {
	           global $link;
		                 $result = mysqli_query($link, $query);
		                 return $result;
}
 */

$uid = $_SESSION['id'];
$product = $_GET['prod'];

query("DELETE FROM cart WHERE cust_id = $uid AND product_id = $product AND bought is NULL");

header("location: " . $_SERVER['HTTP_REFERER']);
exit;
?>

