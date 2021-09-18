<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', '1rmin');
define('DB_NAME', 'webshop');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
function template_header($title) {
	echo <<<EOT
<!DOCTYPE html>
<html>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>Hi, $title.</h1>
                <table class='table table-fixed'>
                  <tr>
		    <td style="text-align:left;" data-width="33,3" data-width-unit="%"> 
			<a href="logout.php">Sign Out</a></td>
                    <td style="text-align:center;"i data-width="33,3" data-width-unit="%"> 
                      <a href="index.php">Home</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="index.php?page=products">Products</a></td>
		    <td style="text-align:right;" data-width="33,3" data-width-unit="%">
			<a href="index.php?page=cart">cart</a></td>
                  </tr>
                </table>
            </div>
        </header>
        <main>
EOT;
}
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, Shopping Cart System</p>
            </div>
        </footer>
        <script src="script.js"></script>
     </body>
</html>
EOT;
}
?>

