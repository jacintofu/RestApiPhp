<?php
include 'Reusable/Reusable.php';
$reusable = new Reusable();

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'POST' :
        $data = file_get_contents('php://input');
        $array_data = json_decode($data, true);
        $reusable->insertPhone($array_data["number_phone"], $array_data["type_phone"]);
        break;
    case 'GET' :
        echo $reusable->allPhone();
        break;
}
