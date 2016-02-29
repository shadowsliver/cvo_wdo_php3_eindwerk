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
        $this->properties = new Properties("nl", "Bibiliotheek Management Systeem - Michel Michaux - WDO 2015-2016");
        $this->functions = new Functions();
        $this->Handler();
    }

    /**
     * Default handler for page load using GET:ACTION
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
            }elseif($_GET['action'] == 'deletelening') {
                $this->db->DeleteLening($_GET['id']);
            }elseif($_GET['action'] == 'deleteklant') {
                $this->db->DeleteKlant($_GET['id']);
            }elseif($_GET['action'] == 'deleteboek') {
                $this->db->DeleteBoek($_GET['id']);
            }elseif($_GET['action'] == 'deleteschrijver') {
                $this->db->DeleteSchrijver($_GET['id']);
            }elseif($_GET['action'] == 'addlening') {
                $this->db->InsertLening($_POST['klant'], $_POST['boek']);
            }elseif($_GET['action'] == 'addklant') {
                $this->db->InsertKlant($_POST['klant_naam'], $_POST['klant_voornaam'], $_POST['klant_gebdatum'], $_POST['klant_adres'], $_POST['klant_gemeente']);
            }elseif($_GET['action'] == 'addschrijver') {
                $this->db->InsertSchrijver($_POST['schrijver_naam'], $_POST['schrijver_bibliografie']);
            }elseif($_GET['action'] == 'addboek') {
                $this->db->InsertBoek($_POST['boek_isbn'], $_POST['boek_titel'], $_POST['boek_schrijvers_id'], $_POST['boek_categorie_id'], $_POST['boek_inhoud']);
            }elseif($_GET['action'] == 'updateklant') {
                $this->db->UpdateKlant($_POST['klant_id'], $_POST['klant_naam'], $_POST['klant_voornaam'], $_POST['klant_gebdatum'], $_POST['klant_adres'], $_POST['klant_gemeente']);
            }elseif($_GET['action'] == 'updateschrijver') {
                $this->db->UpdateSchrijver($_POST['schrijver_id'], $_POST['schrijver_naam'], $_POST['schrijver_bibliografie']);
            }elseif($_GET['action'] == 'updateboek') {
                $this->db->UpdateBoek($_POST['boek_id'], $_POST['boek_isbn'], $_POST['boek_titel'], $_POST['boek_schrijvers_id'], $_POST['boek_categorie_id'], $_POST['boek_inhoud']);
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

    public function GetSchrijvers()
    {
        return $this->db->GetSchrijvers();
    }

    public function GetLeningen(){
        return $this->db->GetLeningen();
    }

    public function GetBoeken(){
        return $this->db->GetBoeken();
    }
    public function GetCatagorieen(){
        return $this->db->GetCategorieen();
    }

    public function GetGemeentes(){
        return $this->db->Getgemeentes();
    }
}