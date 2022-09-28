<?php
include_once("connection.php");
include_once("../func/functions.php");
$amount = 20;
$fecha = new DateTime();
$fecha->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
$current_timestamp = $fecha->getTimestamp();
if (isset($_POST['amount'])) {
    $amount = $amount + $_POST['amount'];
}
$query = "SELECT * FROM `feed` WHERE fecha_inicio < $current_timestamp AND fecha_final > $current_timestamp AND validated='1' LIMIT $amount";
$result = $mysqli->query($query);
?>
<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
    <p align="center">
        <h3><?php echo $row['titulo']; ?></h3>
        <a href="api/redirect.php?id=<?php echo $row['id']; ?>&hash=<?php echo $row['hash'];?>"><?php showDBimage($row['banner'], '600px', '200px'); ?></a>
    </p>
<?php } ?>
