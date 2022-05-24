<?php
include 'Reusable/Reusable.php';
$reusable = new Reusable();

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'POST' :
        $data = file_get_contents('php://input');
        $array_data = json_decode($data, true);
        $reusable->insertContact($array_data["nombre"], $array_data["apellido"], $array_data["email"]);
    break;
    case 'GET' :
        echo $reusable->allContact();
        break;
    case 'DELETE' :
        $data = file_get_contents('php://input');
        $array_data = json_decode($data, true);
        echo $reusable->deleteContact($array_data["contact_id"]);
        break;
}