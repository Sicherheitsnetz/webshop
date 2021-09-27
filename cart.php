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

?>
<?php

$records = query("select p.product, p.id as ordn, SUM(c.qty) as menge, p.price, SUM(c.qty*p.price) AS subtotal from cart c 
	inner join products p on c.product_id = p.id 
	inner join users u on c.cust_id = u.id 
	where cust_id=$uid and bought is NULL
	GROUP BY p.id
	UNION
	select NULL, NULL, NULL, NULL, SUM(subtotal) AS Sum 
	FROM 
		(select p.product, p.id as ordn, c.qty as menge, p.price, c.qty*p.price AS subtotal from cart c 
		inner join products p on c.product_id = p.id 
		inner join users u on c.cust_id = u.id 
		where cust_id=$uid and bought is NULL) AS SUM
	");
	
?>
<table class="table">
    <thead>
	<tr>
		<th scope="col">Product</th>
		<th scope="col">Ord#</th>
		<th scope="col">Quantity</th>
		<th scope="col">Price/Unit</th>
		<th scope="col">Sum</th>
		<th scope="col">Remove</th>
	</tr>
    </thead>
    <tbody>
<!-- We use while loop to fetch data and display rows of date on html table -->

<?php

     while ($course = mysqli_fetch_assoc($records)){

           echo "<tr>";
	       echo "<td>".$course['product']."</td>";
	       echo "<td>".$course['ordn']."</td>";
               echo "<td>".$course['menge']."</td>";
	       echo "<td>".$course['price']."</td>";
	       echo "<td>".$course['subtotal']."</td>";
	       echo "<td><a class='btn btn-outline-danger btn-sm' href='remove.php?prod=".$course['ordn']."'> X </a></td>";
           echo "</tr>";

     }
?>
	</tbody>
	</table>

<?php
	if(isset($_POST['buynow'])) {
		query("UPDATE cart SET bought = now() WHERE cust_id = $uid AND bought IS NULL");
		header("Refresh:0");
	}
?>

<form method="post">
	<input type="submit" name="buynow" class="btn btn-primary" value="Buy now!" />
</form>

</BODY>
</HTML>


