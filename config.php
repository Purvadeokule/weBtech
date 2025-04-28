<?php
// config.php — call this at the top of each script
$servername = "localhost";
$username   = "root";       // your MySQL user
$password   = "";           // your MySQL password
$dbname     = "restaurant";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
