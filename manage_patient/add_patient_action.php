<?php
include("../src/services/patient_service.php");
include('../db/config.php');
if(
isset($_POST['nom']) && 
isset($_POST['prenom']) && 
isset($_POST['date']) && 
isset($_POST['adresse']) && 
isset($_POST['tel']) && 
isset($_POST['profession']) && $_POST['nom'] != "" && 
$_POST['prenom'] != "" && 
$_POST['date'] !="" && 
$_POST['adresse'] !="" && 
$_POST['tel'] !="" && 
$_POST['profession']!=""
) {
    $patient_add = new patient(0,$_POST['nom'],$_POST['prenom'],$_POST['date'],$_POST['adresse'],$_POST['tel'],$_POST['profession']);
    $patient_service = new patient_service($db);
    try{
        $patient_service->add($patient_add);
        header('location:http://'.$_SERVER['HTTP_HOST'].'/manage_patient/');
    }catch(Exception $e){
        echo $e;
    }

}else{
    echo '<center><h1>ERROR !</h1></center>';
}


?>