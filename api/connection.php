<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if ($_SERVER['HTTP_HOST'] == "192.168.64.2") {
    $mysqli = new mysqli('localhost', 'root', 'Corrientes818!', 'metal');
} else {
    $mysqli = new mysqli('localhost', 'metal', 'Merlina97!', 'metal');
}
$mysqli->set_charset('utf8mb4');
?>