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

    public function Handler(){

    }

    public function GetDebugging(){
        return $this->properties->debugging;
    }

    public function GetProperties(){
        return $this->properties;
    }

    public function CallFunction(){
        return $this->functions;
    }

    public function GetDatabase(){
        return $this->db;
    }
}