<?php
include_once("connection.php");
include_once("../func/functions.php");
$amount = 20;
$fecha = new DateTime();
$fecha->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
$current_timestamp = $fecha->getTimestamp();
$side = $_POST['side'];
$query = "SELECT * FROM `ads` WHERE inicio < $current_timestamp AND final IS NULL OR final > $current_timestamp AND side = '$side' LIMIT $amount";
$result = $mysqli->query($query);
?>
<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { 
    $id = $row['id'];
    ?>
    <p align="center">
        <a href="api/adsclick.php?id=<?php echo $id; ?>"><?php showDBimage($row['imagen'], '200px', '600px'); ?></a>
    </p>
<?php 
$addview = "UPDATE ads SET views = views + 1 WHERE id='$id' LIMIT 1";
$mysqli->query($addview);
} 
?>