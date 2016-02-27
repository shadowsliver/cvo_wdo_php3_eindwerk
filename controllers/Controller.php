<?php
include_once './models/DBConn.php';
include_once './models/Properties.php';
include_once './models/Functions.php';

class Controller
{
    private $db;
    private $properties;
    private $functions;

    public function __construct()
    {
        //$this->db = new DBConn("shadow1q_dev", "Shadow2401", "shadow1q_devstock");
        //$this->db = new DBConn("root", "root", "vooraad");
        $this->properties = new Properties("nl", "Page Title");
        $this->functions = new Functions();
        $this->Handler();
    }

    /**
     * Default handler for page load
     */
    public function Handler(){

    }

    /**
     * @return int
     */
    public function GetDebugging(){
        return $this->properties->debugging;
    }

    /**
     * @return Properties
     */
    public function GetProperties(){
        return $this->properties;
    }

    /**
     * @return Functions
     */
    public function CallFunction(){
        return $this->functions;
    }

    /**
     * @return database connection
     */
    public function GetDatabase(){
        return $this->db;
    }
}