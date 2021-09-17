<?php
require_once "config.php";
function query($query) {
   global $link;
   $result = mysqli_query($link, $query);
   return $result;
}

$pwd = query("SELECT password FROM users WHERE id = 2"); 

print $pwd;

//$hash = password_hash($pwd, PASSWORD_DEFAULT);

//$sql = "update users set password = $hash where id = 2";
//mysqli_query($link, $sql);

?>
