<?php
include 'Reusable/Reusable.php';
$reusable = new Reusable();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents('php://input');
    $array_data = json_decode($data, true);
    $contact_id = $array_data['contact_id'];
    foreach ($array_data['phones'] as $item) {
        $array = explode(",", $item);
        foreach ($array as $array_item)
        {
            $reusable->insertContactPhones($contact_id, $array_item);
        }
    }
}