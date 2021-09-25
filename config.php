<?php
session_start();
/* Database credentials. 
*/
$host = 'server328066602.mysql.database.azure.com';
$username = 'lovingredwing8';
$password = 'pmNvaui9ye8sGMnyhfSpwg';
$db_name = 'flexibleserverdb';


/* Attempt to connect to MySQL database */
$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, ".ssl/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$link = $conn;
$title = $_SESSION['id']; 

function query($query) {
    global $link;
    $result = mysqli_query($link, $query);
    return $result;
}


function template_header($title) {
	echo <<<EOT
<!DOCTYPE html>
<html>
	<body>
        <header>
		<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
		   <div class="container">
		   <a class="navbar-brand">Hi, $title</a><br>
		   <div class="collapse navbar-collapse" id="navbarCollapse">
		   <ul class="navbar-nav mr-auto">
		     <li class="nav-item">
		       <a class="nav-link" href="logout.php">Sign Out</a>
		     </li>
		   </ul>
		   </div>
		   <ul class="navbar-nav mr-auto">
		     <li class="nav-item">
		       <a class="nav-link" href="index.php">Home</a>
   		     </li>
 		     <li class="nav-item">
		       <a class="nav-link" href="prevord.php?data=$title">Previous Orders</a>
		     </li>
		     <li class="nav-item active">
		     <a class="nav-link" href="cart.php?data=$title">Cart</a>
	             </li>
		   </ul>
 		   </div>
		</nav>
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

