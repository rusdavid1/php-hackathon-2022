<?php

declare(strict_types = 1);
require_once('Database.php');

class Programme{

    // Date din tabel

    protected $connection;
    protected $table = 'programmes';

    public $title;
    public $room_id;
    public $start_date;
    public $end_date;
    public $max_participants;

    public function __construct($db){
        $this->connection = $db;
    }

    public function read(){
        $query = "SELECT * FROM {$this->table}";
        
        $statement = $this->connection->prepare($query);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);


        // Public field-urile
        $this->title = $row['title'];
        $this->room_id = $row['room_id'];
        $this->start_date = $row['start_date'];
        $this->end_date = $row['end_date'];
        $this->max_participants = $row['max_participants'];

        return $statement;
    }

    public function create(){
        $query = "INSERT INTO {$this->table} SET title = :title, room_id = :room_id, start_date = :start_date, end_date = :end_date, max_participants = :max_participants";
        
        $statement = $this->connection->prepare($query);

        // Sanitizing user submited data
        $this->title = htmlspecialchars($this->title);
        $this->room_id = htmlspecialchars($this->room_id);
        $this->start_date = htmlspecialchars($this->start_date);
        $this->end_date = htmlspecialchars($this->end_date);
        $this->max_participants = htmlspecialchars($this->max_participants);

        // Legatura pentru db

        $statement->bindParam(':title', $this->title);
        $statement->bindParam(':room_id', $this->room_id);
        $statement->bindParam(':start_date', $this->start_date);
        $statement->bindParam(':end_date', $this->end_date);
        $statement->bindParam(':max_participants', $this->max_participants);

        if($statement->execute()){
            return true;
        }
    }

    public function update(){
        $query = "UPDATE {$this->table} SET title = :title, room_id = :room_id, start_date = :start_date, end_date = :end_date, max_participants = :max_participants WHERE id = :id";
        
        $statement = $this->connection->prepare($query);

        // Sanitizing user submited data
        $this->title = htmlspecialchars($this->title);
        $this->room_id = htmlspecialchars($this->room_id);
        $this->start_date = htmlspecialchars($this->start_date);
        $this->end_date = htmlspecialchars($this->end_date);
        $this->max_participants = htmlspecialchars($this->max_participants);

        // Legatura pentru db

        $statement->bindParam(':title', $this->title);
        $statement->bindParam(':room_id', $this->room_id);
        $statement->bindParam(':start_date', $this->start_date);
        $statement->bindParam(':end_date', $this->end_date);
        $statement->bindParam(':max_participants', $this->max_participants);

        if($statement->execute()){
            return true;
        }
    }

    public function delete(){
        $query = "DELETE FROM {$this->table} WHERE id = :id";

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $this->id);

        if($statement->execute()){
            return true;
        }

    }



}



?>