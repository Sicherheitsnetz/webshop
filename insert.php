<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "admin", "1rmin", "webshop");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['pwd']);
 
// Attempt insert query execution
$sql = "INSERT INTO customers (name, first_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
if(mysqli_query($link, $sql)){
    $echo =  "Records added successfully.";
} else{
    $echo = "ERROR: Could not execute $sql. " . mysqli_error($link);
}
// pop-up window, then return to index.php
echo "<script>alert('$echo');document.location='index.php'</script>"; 
// Close connection
mysqli_close($link);
?>
