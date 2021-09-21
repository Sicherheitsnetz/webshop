<?php
session_start();
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', '1rmin');
define('DB_NAME', 'webshop');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$title = $_SESSION['id']; 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

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

