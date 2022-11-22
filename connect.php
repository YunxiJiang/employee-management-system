<?php
$dbConn = mysqli_connect("localhost","root","","shop");
if (!$dbConn){
    die(mysqli_error("Error" + $dbConn));
}
?>
