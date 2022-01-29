<?php

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: DELETE');
header('Acces-Control-Allow-Headers: Acces-Control-Allow-Origin, Content-Type, Acces-Control-Allow-Methods');

require_once '../../model/Database.php';
require_once '../../model/Participant.php';

$Database = new Database();
$db = $Database->connect();

// Conexiune Participant la db
$Participant = new Participant($db);
$data = json_decode(file_get_contents("php://input"));

$Participant->id = $data->id;


if($Participant->delete()){
    echo json_encode(['message' => 'Participant sters ']);
} else{
    echo json_encode(['message' => 'Nu s-a putut sterge participantul']);
}

?>