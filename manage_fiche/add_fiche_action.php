<?php
include("../src/services/appointment_service.php");
include("../src/services/fiche_service.php");
include('../db/config.php');
if(
isset($_POST['id_patient']) && 
isset($_POST['teeth']) &&
isset($_POST['Observations']) &&
isset($_POST['date']) && 
isset($_POST['Intervention']) && 
isset($_POST['doit']) && 
isset($_POST['recu']) && 
$_POST['id_patient'] !="" && 
$_POST['teeth'] !="" &&
$_POST['Observations'] !="" &&
$_POST['date'] !="" && 
$_POST['Intervention'] !="" && 
$_POST['doit'] !="" && 
$_POST['recu'] !="" ) {
    $appointment_add = new appointment(0,$_POST['id_patient'],$_POST['date'],$_POST['Intervention'],$_POST['doit'],$_POST['recu']);
    $fiche_add = new fiche(0,$_POST['id_patient'],$_POST['teeth'],$_POST['Intervention']);
    $appointment_service = new appointment_service($db);
    $fiche_service = new fiche_service($db);
    try{
        $appointment_service->add($appointment_add);
        $fiche_service->add($fiche_add);
        header('location:http://'.$_SERVER['HTTP_HOST'].'/manage_fiche/');
    }catch(Exception $e){
        echo $e;
    }

}else{
    echo '<center><h1>ERROR !</h1></center>';
}


?>