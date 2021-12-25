<?php
include("../src/services/patient_service.php");
include('../db/config.php');
if(isset($_GET['id'])) {
    $patient_service = new patient_service($db);
    try{
        $patient_service->DeleteById($_GET['id']);
        header('location:http://'.$_SERVER['HTTP_HOST'].'/manage_patient/');
    }catch(Exception $e){
        echo $e;
    }

}else{
    echo '<center><h1>ERROR !</h1></center>';
}


?>