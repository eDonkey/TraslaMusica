<?php
include("connection.php");
//require 'vendor/autoload.php';
// use Mailgun\Mailgun;
// $mgClient = Mailgun::create('c934bea788ee53a27022815d0fbd8fa4-07a637b8-63c1323b', 'https://api.eu.mailgun.net');
// $fecha = new DateTime();
$d = $_POST['fecha_inicio'];
$banner = addslashes(file_get_contents($_FILES['banner']['tmp_name']));
if ($_POST['url'] == "") {
    $url = null;
} else {
    $url = $_POST['url'];
}
$side = $_POST['side'];
$fecha_inicio = strtotime($d);

if (!isset($_POST['final'])) {
    $query = "INSERT INTO ads SET imagen='$banner', url='$url', inicio='$fecha_inicio', side='$side'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
} else {
    $fecha_final = strtotime($_POST['fecha_final']);
    $query = "INSERT INTO ads SET imagen='$banner', url='$url', inicio='$fecha_inicio', final='$fecha_final', side='$side'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
}
// $stmt = $mysqli->prepare($query);
// $stmt->execute();
// $mgClient->messages()->send('cordiak.com', [
//     'from'    => 'Mailgun Sandbox <postmaster@cordiak.com>',
//     'to'      => $email,
//     'subject' => 'Valide nuevo feed',
//     'template'    => 'confirmacion',
//     'text'    => 'It is so simple to send a message.',
//     'h:X-Mailgun-Variables'    => '{"email": "'.$email.'", "hash": "'.$hash.'", "shash": "'.$fecha_creado.'"}'
//   ]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../js/colorbox/colorbox.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/colorbox/jquery.colorbox-min.js"></script>
    <script>
        $( document ).ready(function() {
            console.log( "ready!" );
            $.colorbox.close();
        });
        </script>
    <title>Success</title>
</head>
<body>
    <h3>Guardado!</h3>
    <a href="#" onclick="javascript:closeWindow();">Cerrar</a>
</body>
</html>