<?php
include("connection.php");
$email = $_POST['email'];
$hash = $_POST['hash'];
$secondhash = $_POST['shash'];
$query = "UPDATE feed SET validated='1' WHERE email='$email' AND hash='$hash' AND fecha_creado='$secondhash' LIMIT 1";
$mysqli->query($query) or die("Error!");
?>