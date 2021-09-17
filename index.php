<HTML>
<HEAD>
</HEAD>
<TITLE> Webshop </TITLE>
<BODY>
<?php
session_start();
require_once "config.php";

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


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

<style>
   body {
padding:20px;
}
</style>
<!-- 
<form action="insert.php" method="post">
  <div class="col-md-4">
    <label for="NameInput" class="form-label">Name</label>
    <input type="text" class="form-control" name="last_name" id="NameInput" reqiuired>
  </div>
  <div class="col-md-4">
    <label for="FirstNameInput" class="form-label">First Name</label>
    <input type="text" class="form-control" name="first_name" id="FirstNameInput"required>
  </div>

  <div class="col-md-4">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="col-md-4">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pwd" id="exampleInputPassword1" placeholder="Password">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>

</form> 
-->

    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our webstore.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>

<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

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

