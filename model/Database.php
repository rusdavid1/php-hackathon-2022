<?php

declare(strict_types = 1);

class Database {

    // Date de conexiune

    protected string $db_type = 'mysql';
    protected string $db_url = 'localhost';
    protected string $db_user = 'root';
    protected string $db_password = '';
    protected string $db_name = 'evozon';
    protected $connection;

    // Conexiune PDO

    public function connect(){
        $this->connection = null;

        try{
            $this->connection = new PDO("{$this->db_type}:host={$this->db_url};dbname={$this->db_name}", $this->db_user, $this->db_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Eroare de conexiune: {$e->getMessage()}";
        }

        return $this->connection;
    }
}



?>
