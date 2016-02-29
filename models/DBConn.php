<?php

class DBConn
{
    protected $conn;

    /**
     * DBConn constructor.
     */
    function __construct()
    {
        $this->CreateConnection();
    }

    /**
     *  create Database connection (predefined)
     */
    private function CreateConnection()
    {
        $this->conn = new PDO('sqlite:models/db/php3eindwerk.sqlite') or die("cannot open the database");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param $user
     * @param $pass
     * @return bool
     */
    public function Login($user, $pass)
    {
        $sql = "SELECT *  FROM users WHERE user_name= ? AND user_password= ?";
        $data = array($user, $pass);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        $model = $statement->fetchObject();
        if ($model != null) {
            $_SESSION['login'] = true;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return klanten
     */
    public function GetKlanten()
    {
        $sql = "SELECT * FROM klanten k JOIN gemeentes g ON k.klant_id = g.gemeente_id ORDER BY klant_naam ASC";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }

    /**
     * @return schrijvers
     */
    public function GetSchrijvers()
    {
        $sql = "SELECT * FROM schrijvers";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }

    /**
     * @return gemeentes
     */
    public function Getgemeentes()
    {
        $sql = "SELECT * FROM gemeentes";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }

    /**
     * @return Categorieen
     */
    public function GetCategorieen()
    {
        $sql = "SELECT * FROM categorieen";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }

    /**
     * @return boeken
     */
    public function GetBoeken()
    {
        $sql = "SELECT *
                FROM boeken b
                JOIN categorieen c
                ON b.boek_catagorie_id= c.categorie_id
                JOIN schrijvers s
                ON b.boek_schijvers_id = s.schrijver_id";
        $statement = $this->conn->query($sql);
        $statement->execute();
        return $statement;
    }

    /**
     * @param $id
     * @return 1 klant
     */
    public function GetKlant($id)
    {
        $sql = "SELECT * FROM klanten WHERE klant_id= ?";
        $data = array($id);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return $statement->fetchObject();
    }

    /**
     * @param $id
     * @return schrijvers
     */
    public function GetSchrijver($id)
    {
        $sql = "SELECT * FROM schrijvers WHERE schrijver_id= ?";
        $data = array($id);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return $statement->fetchObject();
    }

    /**
     * @param $id
     * @return boek
     */
    public function GetBoek($id)
    {
        $sql = "SELECT * FROM boeken WHERE boek_id= ?";
        $data = array($id);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return $statement->fetchObject();
    }

    /**
     * @return lening
     */
    public function GetLeningen()
    {
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

    /**
     * @param $klant_naam
     * @param $klant_voornaam
     * @param $klant_gebdatum
     * @param $klant_adres
     * @param $klant_gemeente
     */
    public function InsertKlant($klant_naam, $klant_voornaam, $klant_gebdatum, $klant_adres, $klant_gemeente)
    {
        $sql = "INSERT INTO klanten (klant_naam, klant_voornaam, klant_gebdatum, klant_adres, klant_gemeente) VALUES (?,?,?,?,?)";
        $data = array($klant_naam, $klant_voornaam, $klant_gebdatum, $klant_adres, $klant_gemeente);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return $statement->fetchObject();
    }

    /**
     * @param $boek_isbn
     * @param $boek_titel
     * @param $boek_schrijvers_id
     * @param $boek_categorie_id
     * @param $boek_inhoud
     */
    public function InsertBoek($boek_isbn, $boek_titel, $boek_schrijvers_id, $boek_categorie_id, $boek_inhoud)
    {
        $sql = "INSERT INTO boeken (boek_isbn, boek_titel, boek_schijvers_id, boek_catagorie_id, boek_inhoud) VALUES (?,?,?,?,?)";
        $data = array($boek_isbn, $boek_titel, $boek_schrijvers_id, $boek_categorie_id, $boek_inhoud);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
    }

    /**
     * @param $klantId
     * @param $boekId
     */
    public function InsertLening($klantId, $boekId)
    {
        $sql = "INSERT INTO uitleningen (uitlening_klant_id, uitlening_boek_id) VALUES (?,?)";
        $data = array($klantId, $boekId);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
    }

    /**
     * @param $schrijver_naam
     * @param $schrijver_bibliografie
     * @return schrijver
     */
    public function InsertSchrijver($schrijver_naam, $schrijver_bibliografie)
    {
        $sql = "INSERT INTO schrijvers (schrijver_naam, schrijver_bibliografie) VALUES (?,?)";
        $data = array($schrijver_naam, $schrijver_bibliografie);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
    }

    /**
     * @param $id
     *
     * Delete a lening at given id
     */
    public function DeleteLening($id)
    {
        $sql = "DELETE FROM uitleningen WHERE uitlening_id = ?;";
        $data = array($id);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
    }

    /**
     * @param $id
     *
     * Delete a Klant at given id
     */
    public function DeleteKlant($id)
    {
        $sql = "DELETE FROM klanten WHERE klant_id = ?;";
        $data = array($id);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
    }

    /**
     * @param $id
     *
     * Delete a Boek at given id
     */
    public function Deleteboek($id)
    {
        $sql = "DELETE FROM boeken WHERE boek_id = ?;";
        $data = array($id);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
    }

    /**
     * @param $id
     *
     * Delete a Schrijver at given id
     */
    public function DeleteSchrijver($id)
    {
        $sql = "DELETE FROM schrijvers WHERE schrijver_id = ?;";
        $data = array($id);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
    }

    /**
     * @param $id
     * @param $boek_isbn
     * @param $boek_titel
     * @param $boek_schrijvers_id
     * @param $boek_categorie_id
     * @param $boek_inhoud
     */
    public function UpdateBoek($id, $boek_isbn, $boek_titel, $boek_schrijvers_id, $boek_categorie_id, $boek_inhoud)
    {
        $sql = "UPDATE boeken SET boek_isbn=?, boek_titel=?, boek_schijvers_id=?, boek_catagorie_id=?, boek_inhoud=? WHERE boek_id = ?";
        $data = array($boek_isbn, $boek_titel, $boek_schrijvers_id, $boek_categorie_id, $boek_inhoud, $id);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
    }

    /**
     * @param $id
     * @param $schrijver_naam
     * @param $schrijver_bibliografie
     */
    public function UpdateSchrijver($id, $schrijver_naam, $schrijver_bibliografie)
    {
        $sql = "UPDATE schrijvers SET schrijver_naam=?, schrijver_bibliografie= ? WHERE schrijver_id=?";
        $data = array($schrijver_naam, $schrijver_bibliografie, $id);
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
    }

    /**
     * @param $id
     * @param $klant_naam
     * @param $klant_voornaam
     * @param $klant_gebdatum
     * @param $klant_adres
     * @param $klant_gemeente
     */
    public function UpdateKlant($id, $klant_naam, $klant_voornaam, $klant_gebdatum, $klant_adres, $klant_gemeente)
    {
        $sql = "UPDATE klanten SET klant_naam=?, klant_voornaam=?, klant_gebdatum=?, klant_adres=?, klant_gemeente=? WHERE klant_id = ?";
        $data = array($klant_naam, $klant_voornaam, $klant_gebdatum, $klant_adres, $klant_gemeente, $id);
        $statement = $this->conn->prepare($sql);
    }
}