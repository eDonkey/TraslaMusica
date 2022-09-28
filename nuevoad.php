<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
        <link rel="stylesheet" type="text/css" href="css/nuevoad.css" />
        <title>New Ad</title>
    </head>
    <body>
        <form action="api/newad.php" method="post" enctype="multipart/form-data">
            <p><input type="file" name="banner" id="file" /><label for="file" class="btn-2">Subir Imagen</label></p>
            <p>URL (Opcional): <input type="url" name="url" id="url" size="22"></p>
            <p>Columna:
              <select name="side" id="side">
                <option value="left">Izquierda</option>
                <option value="right">Derecha</option>
              </select>
            </p>
            <p>Dia y Hora (Inicio): <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" step="1"></p>
            <p>Tiene fecha de final? <input type="checkbox" name="final" id="final" /></p>
            <div id="fecha_final_field" style="display:none;">
              <p>Dia y Hora (Final): <input type="datetime-local" name="fecha_final" id="fecha_final" step="1" disabled></p>
            </div>
            <input type="submit" value="Enviar">
        </form>        
    </body>
    <script src="js/nuevoflyer.js" type="text/javascript"></script>
</html>