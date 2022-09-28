<?php
include_once("connection.php");
$id = $_GET['id'];
$query = "SELECT * FROM `ads` WHERE id=$id LIMIT 1";
$run = $mysqli->query($query);
if ($run->num_rows === 1 ) {
    $result = $run->fetch_array(MYSQLI_ASSOC);
    $mysqli->query("UPDATE ads SET clicks = clicks + 1 WHERE id=$id LIMIT 1");
    header("Location: ".$result['url']);
} else {
    echo "Value has not been found";
    die();
}
?>