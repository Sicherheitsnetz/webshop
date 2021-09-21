<HTML>
<HEAD>
</HEAD>
<TITLE> Webshop - Cart </TITLE>

<?php
session_start();
include 'config.php';

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

<style>
        body {
                padding:150px;
        }
</style>


<!-- header-template in config.php -->
<?=template_header(htmlspecialchars($_GET[data]))?>
<?php

$uid = $_SESSION['id'];
$records = query("select c.bought AS orderdt, SUM(c.qty) as menge, p.product from cart c 
	inner join products p on c.product_id = p.id 
	where cust_id=$uid and bought is not Null 
	group by bought, product_id");
?>

<table class="table">
	<thead>
		<tr>
			<th scope="col">Order date</th>
			<th scope="col">Quantity</th>
			<th scope="col">Product</th>
		</tr>
	</thead>
	<tbody>
<?php

     	while ($course = mysqli_fetch_assoc($records)){
		echo "<tr>";
			echo "<td>".$course['orderdt']."</td>";
			echo "<td>".$course['menge']."</td>";
			echo "<td>".$course['product']."</td>";
		echo "</tr>";

     }
?>
        </tbody>
</table>
