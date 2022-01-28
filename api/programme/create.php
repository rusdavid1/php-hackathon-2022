<?php

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: POST');
header('Acces-Control-Allow-Headers: Acces-Control-Allow-Origin, Content-Type, Acces-Control-Allow-Methods');

require_once '../../model/Database.php';
require_once '../../model/Programme.php';

$Database = new Database();
$db = $Database->connect();

// Conexiune programme la db
$Programme = new Programme($db);
$data = json_decode(file_get_contents("php://input"));

$Programme->title = $data->title;
$Programme->room_id = $data->room_id;
$Programme->start_date = $data->start_date;
$Programme->end_date = $data->end_date;
$Programme->max_participants = $data->max_participants;

if($Programme->create()){
    echo json_encode(['message' => 'Clasa creata']);
} else{
    echo json_encode(['message' => 'Clasa nu s-a putut crea']);
}

?>