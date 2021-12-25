<?php
// header("Content-Type: application/json; charset=UTF-8");
$id = isset($_GET['id']) ? $_GET['id'] : null;
include($_SERVER["DOCUMENT_ROOT"]."/src/services/patient_service.php");
include($_SERVER["DOCUMENT_ROOT"].'/db/config.php');
$patient_service = new patient_service($db);

$patient = $patient_service->getById($id);

echo json_encode($patient->jsonSerialize());