<?php

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../model/Database.php';
require_once '../../model/Participant.php';

$Database = new Database();
$db = $Database->connect();

// Conexiune Participant la db
$Participant = new Participant($db);
$response = $Participant->read();

$ParticipantArray = [];
$ParticipantArray['data'] = [];

// Structurarea response-ului

while($row = $response->fetch(PDO::FETCH_ASSOC)){
    extract($row);

    $ParticipantClass = [
        'id' => $id,
        'full_name' => $full_name,
        'programme_id' => $programme_id,

    ];

    $ParticipantArray['data'][] = $ParticipantClass;

}
echo json_encode($ParticipantArray);

?>