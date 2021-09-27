<?php
ini_set('log_errors', 1);
ini_set('error_log', './ERROR.LOG');
error_reporting(E_ALL);

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
// Check if "add to cart" was pushed
if(isset($_POST['submit'])) {
?>
SUBMIT was pushed<br>
Product-ID: <?=$_POST['prodID']?><br>
User-ID: <?=$uid?><br>
<?php
	 $id = $_POST['prodID'];
         $insert = query("INSERT INTO cart(cust_id, product_id, qty) VALUES($uid, $id, 1)");
            if(!$insert) {
               echo mysqli_error();
            }
            else
            {
               echo "added";
            }
}
header("location: " . $_SERVER['HTTP_REFERER']);
exit;

?>

