<?php
include("../src/services/fiche_service.php");
include('../db/config.php');
if(isset($_GET['id'])) {
    $fiche_service = new fiche_service($db);
    try{
        $fiche_service->DeleteById($_GET['id']);
        header('location:http://'.$_SERVER['HTTP_HOST'].'/manage_fiche/');
    }catch(Exception $e){
        echo $e;
    }

}else{
    echo '<center><h1>ERROR !</h1></center>';
}


?>