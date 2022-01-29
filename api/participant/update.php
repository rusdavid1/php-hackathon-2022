<?php

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: PUT');
header('Acces-Control-Allow-Headers: Acces-Control-Allow-Origin, Content-Type, Acces-Control-Allow-Methods');

require_once '../../model/Database.php';
require_once '../../model/Participant.php';

$Database = new Database();
$db = $Database->connect();

// Conexiune Participant la db
$Participant = new Participant($db);
$data = json_decode(file_get_contents("php://input"));


$Participant->full_name = $data->full_name;
$Participant->programme_id = $data->programme_id;
$Participant->id = $data->id;


if($Participant->update()){
    echo json_encode(['message' => 'Participant actualizat ']);
} else{
    echo json_encode(['message' => 'Nu s-a putut actualiza participantul']);
}

?>