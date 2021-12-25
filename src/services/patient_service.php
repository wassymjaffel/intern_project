<?php 
include($_SERVER["DOCUMENT_ROOT"]."/src/models/patient.php");

class patient_service
{
    protected $patient;
    protected $_db; 

    public function __construct(PDO $db) 
    {
        $this->_db = $db;
    }

    public function getAll()
    {
        $sql="SELECT * FROM patient";
        $result = $this->_db->query($sql);
        $patients = [];
        while($donneee=$result->fetch()){
            $_patient = new patient($donneee['id'],$donneee['nom'],$donneee['prenom'],$donneee['date_de_naissance'],$donneee['adresse'],$donneee['tel'],$donneee['profession']);
            array_push($patients,$_patient);
        }

        return $patients;
    }




    public function getById($id)
    {
        $sql="SELECT * FROM patient WHERE id=$id";
        $result = $this->_db->query($sql);
        while($donneee=$result->fetch()){
            $_patient = new patient($donneee['id'],$donneee['nom'],$donneee['prenom'],$donneee['date_de_naissance'],$donneee['adresse'],$donneee['tel'],$donneee['profession']);
        }

        return $_patient;
    }

    public function UpdateById($patient_mod)
    {
        try{
            $sql ="UPDATE `patient` SET `nom`='".$patient_mod->getFirst_name()."',`prenom`='".$patient_mod->getLast_name()."',`date_de_naissance`='".$patient_mod->getAnniversary()."',`adresse`='".$patient_mod->getAddress()."',`tel`='".$patient_mod->getTel()."',`profession`='".$patient_mod->getWork()."' WHERE id=".$patient_mod->getId();
           
            $result = $this->_db->query($sql);
            return true;
        }catch(Exception $e){
            return false;
        }
       
    }

    public function DeleteById($id)
    {
        try{
            $sql = "DELETE from `patient` where id=$id";
            $result = $this->_db->query($sql);
            return true;
        }catch(Exception $e){
            return false;
        }
       
    }

    public function add($patient_add)
    {
        try{
            $sql ="INSERT INTO `patient`(`id`, `nom`, `prenom`, `date_de_naissance`, `adresse`, `tel`, `profession`) VALUES (null,'".$patient_add->getFirst_name()."','".$patient_add->getLast_name()."','".$patient_add->getAnniversary()."','".$patient_add->getAddress()."','".$patient_add->getTel()."','".$patient_add->getWork()."')";
            $result = $this->_db->query($sql);
            return true;
        }catch(Exception $e){
            return false;
        }
       
    }

}