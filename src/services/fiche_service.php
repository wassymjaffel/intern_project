<?php 
include($_SERVER["DOCUMENT_ROOT"]."/src/models/fiche.php");


class fiche_service
{
    protected $patient;
    protected $_db; 

    public function __construct(PDO $db) 
    {
        $this->_db = $db;
    }

    public function getAll()
    {
        include("patient_service.php");
        $patient_service = new patient_service($this->_db);
        $sql="SELECT * FROM `fiche`";
        $result = $this->_db->query($sql);
        $fiches = [];
        while($donneee=$result->fetch()){
            $patient = $patient_service->getById($donneee['id_patient']);
            $_fiche = new fiche($donneee['id'],$patient,$donneee['teeth'],$donneee['observations']);
            array_push($fiches,$_fiche);
        }
        return $fiches;
    }

    public function DeleteById($id)
    {
        try{
            $sql = "DELETE FROM `fiche` where id=$id";
            $result = $this->_db->query($sql);
            return true;
        }catch(Exception $e){
            return false;
        }
       
    }

    public function add($fiche_add)
    {
        try{
            $sql ="INSERT INTO `fiche`(`id`, `id_patient`, `teeth`, `observations`) VALUES (null,'".$fiche_add->getpatient()."','".$fiche_add->getTeeth()."','".$fiche_add->getObservations()."')";
            
            $result = $this->_db->query($sql);
            return true;
        }catch(Exception $e){
            return false;
        }
       
    }

    

    public function getById($id)
    {
        include("patient_service.php");
        $patient_service = new patient_service($this->_db);
        $sql="SELECT * FROM fiche WHERE id=$id";
        $result = $this->_db->query($sql);
        while($donneee=$result->fetch()){
            $patient = $patient_service->getById($donneee['id_patient']);
            $_fiche = new fiche($donneee['id'],$patient,$donneee['teeth'],$donneee['observations']);
        }
        return $_fiche;
    }

   

   

    public function UpdateById($fiche_mod)
    {
        try{
            $sql ="UPDATE `fiche` SET `teeth`='".$fiche_mod->getTeeth()."',`observations`='".$fiche_mod->getObservations()."'WHERE id=".$fiche_mod->getId();
            $result = $this->_db->query($sql);
           return true;
           }catch(Exception $e){
            return false;
        }
       
    }
}