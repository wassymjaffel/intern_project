<?php
include("../src/services/fiche_service.php");
include('../db/config.php');
if(isset($_POST['id_fiche']) &&
    isset($_POST['id_patient']) && 
isset($_POST['teeth']) &&
isset($_POST['Observations'])) {
    $fiche_mod = new fiche($_POST['id_fiche'],$_POST['id_patient'],$_POST['teeth'],$_POST['Observations']);
    $fiche_service = new fiche_service($db);
    try{
    $fiche_service->UpdateById($fiche_mod);
       header('location:http://'.$_SERVER['HTTP_HOST'].'/manage_fiche/');
       //print_r($fiche_mod);
    }catch(Exception $e){
        echo $e;
    }

}else{
    echo '<center><h1>ERROR !</h1></center>';
}


?>