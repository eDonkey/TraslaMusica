<?php
include("connection.php");
require 'vendor/autoload.php';
// use Mailgun\Mailgun;
// $mgClient = Mailgun::create('c934bea788ee53a27022815d0fbd8fa4-07a637b8-63c1323b', 'https://api.eu.mailgun.net');
$fecha = new DateTime();
$d = $_POST['fecha_inicio'];
$fecha_creado = $fecha->getTimestamp();
$banner = addslashes(file_get_contents($_FILES['banner']['tmp_name']));
$url = $_POST['url'];
$fecha_final = strtotime($d);
$fecha_inicio = strtotime('-1 week', $fecha_final);
$hash = hash('ripemd160', $fecha_creado);
$banda = $_POST['banda'];
$email = $_POST['email'];
$query = "INSERT INTO feed SET fecha_creado='$fecha_creado', banner='$banner', url='$url', fecha_inicio='$fecha_inicio', fecha_final='$fecha_final', hash='$hash', banda='$banda', email='$email'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
// $mgClient->messages()->send('cordiak.com', [
//     'from'    => 'Mailgun Sandbox <postmaster@cordiak.com>',
//     'to'      => $email,
//     'subject' => 'Valide nuevo feed',
//     'template'    => 'confirmacion',
//     'text'    => 'It is so simple to send a message.',
//     'h:X-Mailgun-Variables'    => '{"email": "'.$email.'", "hash": "'.$hash.'", "shash": "'.$fecha_creado.'"}'
//   ]);
echo "done";
?>