<?php
$head = getallheaders();
include("connection.php");
if (isset($head['AUTH'])) {
    $admin = $head['AUTH'];
    if ($admin != "awdoviak@gmail.com") {
        echo "Admin identity is wrong";
        die();
    }
} else {
    echo "Admin has not been identified";
    die();
}
function generateRandomString($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$query = "TRUNCATE TABLE auth";
$mysqli->query($query);
for ($i=0;$i<10;$i++) {
    $hash = generateRandomString();
    $query = "INSERT INTO auth SET token='$hash'";
    $mysqli->query($query) or die("Die when generate token number ".$i);
    echo "Token ".$i." generated: ".$hash." <br />";
}
?>