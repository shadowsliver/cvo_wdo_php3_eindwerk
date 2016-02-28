<?php

class DBConn
{
    public $conn;

    /**
     * DBConn constructor.
     */
    function __construct()
    {
        $this->CreateConnection();
    }

    private function CreateConnection()
    {
        $this->conn = new PDO('sqlite:models/php3eindwerk.sqlite') or die("cannot open the database");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function Login($user, $pass)
    {
        $sql = "SELECT *  FROM users WHERE user_name= ? AND user_password= ?";
        $data = array($user, $pass);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        $model = $statement->fetchObject();
        if($model != null){
            $_SESSION['login'] = true;
            return true;
        }else{
            return false;
        }
    }

    public function GetKlanten()
    {
        $sql = "SELECT * FROM klanten";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }

    public function GetSchijvers()
    {
        $sql = "SELECT * FROM schrijvers";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }

    public function GetBoeken()
    {
        $sql = "SELECT * FROM boeken";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }

    public function GetLeningen(){
        $sql = "SELECT *
                FROM klanten k
                JOIN uitleningen u
                on k.klant_id = u.uitlening_klant_id
                JOIN boeken b
                on u.uitlening_boek_id = b.boek_id";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }

    public function GetLeningenLaat(){
        $sql = "SELECT *
                FROM klanten k
                JOIN uitleningen u
                on k.klant_id = u.uitlening_klant_id
                JOIN boeken b
                on u.uitlening_boek_id = b.boek_id
                WHERE u.uitlening_datum + INTERVAL 2 DAY < NOW()";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }
}