<HTML>
<HEAD>
</HEAD>
<TITLE> Webshop - Cart </TITLE>

<?php
include 'config.php';
function query($query) {
	   global $link;
	      $result = mysqli_query($link, $query);
	      return $result;
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

<!-- header-template in config.php -->
<?=template_header(htmlspecialchars($_GET['data']))?>
<?php
$uid = query("select id from users where username = data");
$records = query("select * from cart where cust_id = 9");
/*
$ekw = query("select p.product, SUM(c.qty), p.price, SUM(c.qty*p.price) AS subtotal from cart c 
inner join products p on c.product_id = p.id 
inner join customers k on c.cust_id = k.id 
where cust_id = $uid
Group by p.id
UNION
select mail, SUM(menge), 0.00, SUM(subtotal)
FROM 
	(select k.email AS mail, c.qty AS menge, p.price, c.qty*p.price AS subtotal from cart c 
	inner join products p on c.product_id = p.id 
	inner join customers k on c.cust_id = k.id 
	where cust_id = $uid) 
AS SUM");
 */
?>
<table width="400" border="2" cellpadding="2" cellspacing='1'>

	<tr bgcolor="#2ECCFA">
		<th>Customer ID</th>
		<th>Product ID</th>
		<th>Quantity</th>
		<th>Date</th>
	</tr>
<!-- We use while loop to fetch data and display rows of date on html table -->

<?php

     while ($course = mysqli_fetch_assoc($records)){

           echo "<tr>";
               echo "<td>".$course['cust_id']."</td>";
               echo "<td>".$course['product_id']."</td>";
	       echo "<td>".$course['qty']."</td>";
	       echo "<td>".$course['bought']."</td>";
           echo "</tr>";

     }
?>
        </table>



</BODY>
</HTML>


