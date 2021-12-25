<?php
include("../src/services/appointment_service.php");
include('../db/config.php');
if(isset($_POST['id']) && 
isset($_POST['Patient']) && 
isset($_POST['date']) && 
isset($_POST['Intervention']) && 
isset($_POST['doit']) && 
isset($_POST['recu']) ) {
    $appointment_mod = new appointment($_POST['id'],$_POST['Patient'],$_POST['date'],$_POST['Intervention'],$_POST['doit'],$_POST['recu']);
    $appointment_service = new appointment_service($db);
    try{
        $appointment_service->UpdateById($appointment_mod);
        header('location:http://'.$_SERVER['HTTP_HOST'].'/manage_appointment/');
    }catch(Exception $e){
        echo $e;
    }

}else{
    echo '<center><h1>ERROR !</h1></center>';
}


?>