<?php 

include($_SERVER["DOCUMENT_ROOT"]."/src/models/appointment.php");


class appointment_service
{
    protected $appointment;
    protected $_db; 

    public function __construct(PDO $db) 
    {
        $this->_db = $db;
    }

    public function getAll()
    {
        include("patient_service.php");
        $patient_service = new patient_service($this->_db);
        $sql="SELECT * FROM `rendez_vous`";
        $result = $this->_db->query($sql);
        $appointments = [];
        while($donneee=$result->fetch()){
            $patient = $patient_service->getById($donneee['id_patient']);
            $_appointment = new appointment($donneee['id'],$patient,$donneee['date'],$donneee['intervention'],$donneee['doit'],$donneee['recu']);
            array_push($appointments,$_appointment);
        }
        return $appointments;
    }




    public function getById($id)
    {
        include("patient_service.php");
        $patient_service = new patient_service($this->_db);
        $sql="SELECT * FROM rendez_vous WHERE id=$id";
        $result = $this->_db->query($sql);
        while($donneee=$result->fetch()){
            $patient = $patient_service->getById($donneee['id_patient']);
            $_appointment = new appointment($donneee['id'],$patient,$donneee['date'],$donneee['intervention'],$donneee['doit'],$donneee['recu']);
        }
        return $_appointment;
    }

   

    public function DeleteById($id)
    {
        try{
            $sql = "DELETE FROM `rendez_vous` where id=$id";
            $result = $this->_db->query($sql);
            return true;
        }catch(Exception $e){
            return false;
        }
       
    }

    public function add($appoinment_add)
    {
        try{
            $sql ="INSERT INTO `rendez_vous`(`id`, `id_patient`, `date`, `intervention`, `doit`, `recu`) VALUES (null,'".$appoinment_add->getpatient()."','".$appoinment_add->getDate()."','".$appoinment_add->getIntervention()."','".$appoinment_add->getDoit()."','".$appoinment_add->getRecu()."')";
            $result = $this->_db->query($sql);
            return true;
        }catch(Exception $e){
            return false;
        }
       
    }

    public function UpdateById($appoinment_mod)
    {
        try{
            $sql ="UPDATE `rendez_vous` SET `id_patient`='".$appoinment_mod->getpatient()."',`date`='".$appoinment_mod->getDate()."',`intervention`='".$appoinment_mod->getIntervention()."',`doit`='".$appoinment_mod->getDoit()."',`recu`='".$appoinment_mod->getRecu()."' WHERE id=".$appoinment_mod->getId();
            $result = $this->_db->query($sql);
            return true;
        }catch(Exception $e){
            return false;
        }
       
    }

    public function getByPatientId($id_patient)
    {
        $patient_service = new patient_service($this->_db);
        $sql="SELECT * FROM rendez_vous WHERE id_patient=$id_patient";
        $result = $this->_db->query($sql);
        $appointments = [];
        while($donneee=$result->fetch()){
            $patient = $patient_service->getById($donneee['id_patient']);
            $_appointment = new appointment($donneee['id'],$patient,$donneee['date'],$donneee['intervention'],$donneee['doit'],$donneee['recu']);
            array_push($appointments,$_appointment);
        }
        return $appointments;
    }

}