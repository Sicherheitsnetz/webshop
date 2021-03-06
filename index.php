<HTML>
<HEAD>
</HEAD>
<TITLE> Webshop </TITLE>
<!--<BODY>-->
<?php
ini_set('log_errors', 1);
ini_set('error_log', './ERROR.LOG');
error_reporting(E_ALL);

session_start();
include 'config.php';

?>

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
<!-- header-template in config.php -->
<?=$uid = $_SESSION["id"]?>
<?=template_header(htmlspecialchars($_SESSION["username"]))?>
<img src="pictures/musicstore.png" class="img-fluid">
<?php
$result = query("select * from products");
while ($row = mysqli_fetch_assoc($result)) {
   $image = $row['image'];	
   $id = $row['id'];
   $product = $row['product'];
   $price = $row['price'];
?>   

<div class="card-deck">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="<?=$image?>" alt="$product">
      <div class="card-body">
      <h5 class="card-title"><?=$product?> (Ord# <?=$id?>)</h5>
         <p class="card-text">€ <?=$price?></p>
	 <form action="insert.php" method="POST">
		<input type="hidden" name="prodID" value=<?=$id?>>
	 	<input type="submit" name="submit" value="Add to cart">
	</form>
      </div>
      </div>
</div>

<?php
}

?>

</BODY>
</HTML>

