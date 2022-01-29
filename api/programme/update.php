<?php

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: PUT');
header('Acces-Control-Allow-Headers: Acces-Control-Allow-Origin, Content-Type, Acces-Control-Allow-Methods');

require_once '../../model/Database.php';
require_once '../../model/Programme.php';

$Database = new Database();
$db = $Database->connect();

// Conexiune Programme la db
$Programme = new Programme($db);
$data = json_decode(file_get_contents("php://input"));


$Programme->full_name = $data->full_name;
$Programme->programme_id = $data->programme_id;
$Programme->id = $data->id;


if($Programme->update()){
    echo json_encode(['message' => 'Programme actualizat ']);
} else{
    echo json_encode(['message' => 'Nu s-a putut actualiza Programmeul']);
}

?>