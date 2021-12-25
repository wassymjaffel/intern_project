<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'intern_project';
try{
        $db=new PDO('mysql:host='.$dbHost.';dbname='.$dbName.'',$dbUser,$dbPass);
}catch(Exception $e){
        echo e;
}


?>