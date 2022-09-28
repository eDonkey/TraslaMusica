<?php
function showValidation($value) {
    switch ($value) {
        case 0:
            echo "No";
            break;
        case 1:
            echo "Si";
            break;
    }
}
function showOptions($value) {
    switch ($value) {
        case 0:
            echo "<a title='activar' href=''><img src='imgs/green.png' width='32px' height='32px'></img></a>   <a title='reenviar email' href=''><img src='imgs/email-send-icon.png' width='32px' height='32px'></img></a>";
            break;
        case 1:
            echo "<a title='desactivar' href=''><img src='imgs/red.png' width='32px' height='32px'></img></a>";
            break;
    }
}
function showDBimage($path, $width, $height) {
    echo '<img width="'.$width.'" height="'.$height.'" src="data:image/jpeg;base64,'.base64_encode($path).'"/>';
}
?>