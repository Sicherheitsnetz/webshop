<HTML>
<HEAD>
</HEAD>
<TITLE> Webshop </TITLE>
<!--<BODY>-->
<?php
session_start();
include 'config.php';

/*
$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = '1rmin';
$dbname = 'webshop';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
*/

function query($query) {
   global $link;
   $result = mysqli_query($link, $query);
   return $result;
}

?>

<!-- just another comment -->
<!-- and one more -->
<!-- third comment -->
<!-- fouth comment -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

<style>
   body {
padding:20px;
}
</style>


<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_nohash.php");
    exit;
}
?>
//header-template in config.php
<?=template_header(htmlspecialchars($_SESSION["username"]);)?>

$result = query("select * from products");
print"<table class='table table-bordered'>";

print "<tr>";
print "<th colspan=3 font size=6><center>Catalogue</center>";
print "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
   $id = $row['id'];
   $product = $row['product'];
   $price = $row['price'];

print "<tr>";
print "<td>$id <td>$product <td>$price";
print "</tr>";

}

print "</table>";
?>

</BODY>
</HTML>

