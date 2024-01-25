<?php
$con=mysqli_connect('localhost','root','','') or die("couldn't connect");
if ($con) {
    echo "Connected to the database successfully!";
} else {
    echo "Not connected to the database. Check your connection settings.";
}
?>