<?php
include("api/connection.php");
$query = "SELECT DISTINCT banda FROM feed";
$result = $mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
        <link rel="stylesheet" type="text/css" href="css/nuevoflyer.css" />
        <title>New Flyer</title>
    </head>
    <body>
        <form action="api/newfeed.php" method="post" enctype="multipart/form-data">
            <p>Banda: 
            <select name="banda" id="banda">
<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                <option value="<?php echo $row['banda']; ?>"><?php echo $row['banda']; ?></option>
<?php } ?>
            </select><span id="bandnotlisted"> - <a href="javascript:noBand();">Mi banda no esta</a></span></p>
            <p>Dia y Hora: <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" step="1"></p>
            <p>URL (Opcional): <input type="url" name="url" id="url" size="22"></p>
            <p>E-Mail: <input type="email" name="email" id="email" size="31" required></p>
            <p><input type="file" name="banner" id="file" /><label for="file" class="btn-2">Subir Imagen</label></p>
            <input type="submit" value="Enviar">
        </form>        
    </body>
    <script src="js/nuevoflyer.js" type="text/javascript"></script>
</html>