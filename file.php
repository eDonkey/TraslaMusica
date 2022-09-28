<?php
$file = json_decode(file_get_contents(".config"), TRUE);
//$encoded = json_decode($file, TRUE);
die(var_dump($file));
?>