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
        $this->db = new DBConn();
        $this->properties = new Properties("nl", "Page Title");
        $this->functions = new Functions();
        $this->Handler();
    }

    /**
     * Default handler for page load
     */
    public function Handler()
    {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'login') {
                $test = $this->db->Login($_POST['login'], $_POST['password']);
                if($test){
                    $this->functions->message_info("u bent ingelogd!");
                    $this->functions->redirect('index.php?page=home');
                }else{
                    $this->functions->message_error("Inlog gegevens waren incorrect");
                }
            }
        }
    }

    /**
     * @return int, 1 = debugging, 0 = none
     */
    public function GetDebugging()
    {
        return $this->properties->debugging;
    }

    /**
     * @return Properties
     */
    public function GetProperties()
    {
        return $this->properties;
    }

    /**
     * @return Functions
     */
    public function CallFunction()
    {
        return $this->functions;
    }

    /**
     * @return database connection
     */
    public function GetDatabase()
    {
        return $this->db;
    }

    public function GetKlanten()
    {
        return $this->db->GetKlanten();
    }

    public function GetLeningen(){
        return $this->db->GetLeningen();
    }
}