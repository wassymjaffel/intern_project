<?php
include($_SERVER["DOCUMENT_ROOT"]."/src/services/appointment_service.php");
include($_SERVER["DOCUMENT_ROOT"].'/db/config.php');
if(
isset($_POST['Patient']) && 
isset($_POST['date']) && 
isset($_POST['Intervention']) && 
isset($_POST['doit']) && 
isset($_POST['recu']) ) {
    $appointment_add = new appointment(0,$_POST['Patient'],$_POST['date'],$_POST['Intervention'],$_POST['doit'],$_POST['recu']);
    $appointment_service = new appointment_service($db);
    try{
        $appointment_service->add($appointment_add);
        echo json_encode('done');
    }catch(Exception $e){
        echo json_encode($e);
    }

}else{
    echo json_encode('<center><h1>ERROR !</h1></center>');
}


?>