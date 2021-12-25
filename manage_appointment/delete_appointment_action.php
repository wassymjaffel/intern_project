<?php
include("../src/services/appointment_service.php");
include('../db/config.php');
if(isset($_GET['id'])) {
    $appointment_service = new appointment_service($db);
    try{
        $appointment_service->DeleteById($_GET['id']);
        if(isset($_GET['ficheid'])){
            header('location:http://'.$_SERVER['HTTP_HOST'].'/manage_fiche/edit_fiche.php?id='.$_GET['ficheid']);
        }else{
            header('location:http://'.$_SERVER['HTTP_HOST'].'/manage_appointment/');
        }
       
    }catch(Exception $e){
        echo $e;
    }

}else{
    echo '<center><h1>ERROR !</h1></center>';
}


?>