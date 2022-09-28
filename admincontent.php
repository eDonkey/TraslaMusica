<?php
include("api/connection.php");
include('func/functions.php');
$token = $_GET['token'];
$query = "SELECT token FROM `auth` WHERE `token`='$token'";
$res = $mysqli->query($query);
if ($res->num_rows === 0) {
    echo "You're not authorized to see this page";
    die();
}
$query = "SELECT * FROM feed";
$result = $mysqli->query($query);
$query2 = "SELECT * FROM ads";
$result2 = $mysqli->query($query2);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/admincontent.js" type="text/javascript"></script>
        <title>Administrar Contenido</title>
    </head>
    <body>
        <div class="container" align="center" style="padding-top:50px;">
            <div class="mainmenu">
                <a href="javascript:showBanners();">Banners</a> - <a href="javascript:showAds();">Sponsors</a>
            </div>
            <div id="contentAds" style="padding-top:50px;display:none;">
                <table border="0">
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Finalizacion</th>
                            <th>Panel</th>
                            <th>Vistas</th>
                        </tr>
                        <?php while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td width="100" align="center"><?php echo $row2['id']; ?></td>
                        <td width="200" align="center" style="passing-top:3px;"><?php showDBimage($row2['imagen'], '25px', '75px'); ?></td>
                        <td width="100" align="center"><?php echo date('m/d/Y H:i:s', $row2['inicio']); ?></td>
                        <td width="100" align="center"><?php if ($row2['final'] != null ) { echo date('m/d/Y H:i:s', $row2['final']); } else { echo "No definido"; } ?></td>
                        <td width="50" align="center"><?php echo $row2['side']; ?></td>
                        <td width="50" align="center"><?php echo $row2['views']; ?></td>
                    </tr>
    <?php } ?>
                </table>
            </div>
            <div id="contentBanners" style="padding-top:50px;">
                <table border="0">
                    <tr>
                        <th>Fecha Creado</th>
                        <th>Imagen</th>
                        <th>URL</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Show</th>
                        <th>Click</th>
                        <th>Banda</th>
                        <th>Email</th>
                        <th>Fue Validado?</th>
                        <th></th>
                    </tr>
    <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td width="100" align="center"><?php echo date('m/d/Y H:i:s', $row['fecha_creado']); ?></td>
                        <td width="200" align="center" style="passing-top:3px;"><?php showDBimage($row['banner'], '150px', '50px'); ?></td>
                        <td width="300" align="center"><?php echo $row['url']; ?></td>
                        <td width="100" align="center"><?php echo date('m/d/Y H:i:s', $row['fecha_inicio']); ?></td>
                        <td width="100" align="center"><?php echo date('m/d/Y H:i:s', $row['fecha_final']); ?></td>
                        <td width="50" align="center"><?php echo $row['clicks']; ?></td>
                        <td width="200" align="center"><?php echo $row['banda']; ?></td>
                        <td width="200" align="center"><?php echo $row['email']; ?></td>
                        <td width="50" align="center"><?php showValidation($row['validated']); ?></td>
                        <td width="70" align="center"><?php showOptions($row['validated']); ?></td>
                    </tr>
    <?php } ?>
                </table>
            </div>
        </div>
    </body>
</html>