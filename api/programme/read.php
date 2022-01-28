<?php

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../model/Database.php';
require_once '../../model/Programme.php';

$Database = new Database();
$db = $Database->connect();

// Conexiune programme la db
$Programme = new Programme($db);
$response = $Programme->read();

$programmeArray = [];
$programmeArray['data'] = [];

// Structurarea response-ului

while($row = $response->fetch(PDO::FETCH_ASSOC)){
    extract($row);

    $programmeClass = [
        'id' => $id,
        'title' => $title,
        'room_id' => $room_id,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'max_participants' => $max_participants,
    ];

    $programmeArray['data'][] = $programmeClass;

}
echo json_encode($programmeArray);

?>