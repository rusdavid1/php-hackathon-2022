<?php

declare(strict_types = 1);
require_once('Database.php');

class Participant{

    // Date din tabel

    protected $connection;
    protected $table = 'participants';

    public $id;
    public $full_name;
    public $programme_id;
    public $programme_title;

    public function __construct($db){
        $this->connection = $db;
    }

    public function read(){
        // $query = "SELECT * FROM {$this->table}";
        $query = "SELECT participants.id, participants.full_name, participants.programme_id, programmes.title FROM {$this->table} LEFT JOIN programmes ON programmes.id = participants.programme_id;";
        
        $statement = $this->connection->prepare($query);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);


        // Public field-urile
        $this->id = $row['id'];
        $this->full_name = $row['full_name'];
        $this->programme_id = $row['programme_id'];
        $this->programme_title = $row['title'];



        return $statement;
    }

    public function create(){
        $query = "INSERT INTO {$this->table} SET full_name = :full_name, programme_id = :programme_id";
        
        $statement = $this->connection->prepare($query);

        // Sanitizing user submited data
        $this->full_name = htmlspecialchars($this->full_name);
        $this->programme_id = $this->programme_id; 


        // Legatura pentru db

        $statement->bindParam(':full_name', $this->full_name);
        $statement->bindParam(':programme_id', $this->programme_id);

        if($statement->execute()){
            return true;
        }
    }

    public function update(){
        $query = "UPDATE {$this->table} SET full_name = :full_name, programme_id = :programme_id WHERE id = :id";
        
        $statement = $this->connection->prepare($query);

        // Sanitizing user submited data
        $this->full_name = htmlspecialchars($this->full_name);
        $this->programme_id = $this->programme_id; //A bug named EatingYourSanity lived here not so long ago. May he never rest like he didn't let me do.
        $this->id = $this->id; 

        // Legatura pentru db

        $statement->bindParam(':full_name', $this->full_name);
        $statement->bindParam(':programme_id', $this->programme_id);
        $statement->bindParam(':id', $this->id);

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