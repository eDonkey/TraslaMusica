<?php
header('Content-Type: application/json; charset=utf-8');
$data = array(
    "foo" => "bar",
    "bar" => "foo",
);
echo json_encode($data);
?>