<?php

class DBConn
{

    private $user;
    private $password;
    private $databaseName;
    private $port;
    private $conn;

    public function __construct($user, $password, $databaseName)
    {
        $this->user = $user;
        $this->password = $password;
        $this->databaseName = $databaseName;
        $this->port = $port;
        $this->CreateConnection();
    }

    private function CreateConnection()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=$this->databaseName", $this->user, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // geeft fouten in sql weer
    }

    public function GetAllRecords($table)
    {
        $sql = "SELECT * FROM $table WHERE $table"."_id=1";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $product = $statement-> fetchObject();

        return $product;
    }

    public function UpdateRecord($input, $output, $table){
        $sql="UPDATE $table SET $input = $output WHERE $table"."_id=1";

        $statement = $this->conn->prepare($sql);
        $statement->execute();
    }


    public function saveBoek($title, $isbn, $prijs, $schrijver, $genre, $inhoud){
        $boekSQL = "INSERT INTO boek(boek_titel, boek_isbn, boek_prijs, schrijver_id, boek_genre, boek_inhoud)
                    VALUES(?, ?, ?, ?, ?, ?)";
        $formData= array($title, $isbn, $prijs, $schrijver, $genre, $inhoud);
        $boekStatement = $this->makeStatement($boekSQL, $formData);
        return $this->db->lastInsertId();
    }
}