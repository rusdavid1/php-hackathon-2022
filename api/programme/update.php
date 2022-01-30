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


$Programme->id = $data->id;
$Programme->title = $data->title;
$Programme->room_id = $data->room_id;
$Programme->start_date = $data->start_date;
$Programme->end_date = $data->end_date;
$Programme->max_participants = $data->max_participants;


if($Programme->update()){
    echo json_encode(['message' => 'Programme actualizat ']);
} else{
    echo json_encode(['message' => 'Nu s-a putut actualiza Programmeul']);
}


?>