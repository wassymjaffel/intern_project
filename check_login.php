<?php
$username = $_POST['username']; //Set UserName
$password = $_POST['password']; //Set Password
$msg ='';
// Including the database config
include('./db/config.php');
if(isset($username, $password)) {
    ob_start();
    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);
    $sql="SELECT count(*) FROM login_admin WHERE user_name='$myusername' and user_pass=SHA('$mypassword')";
    $result = $db->query($sql);
    while($donneee=$result->fetch()){
        $count = $donneee;
        }

    if($count[0]==1){
        // Register $myusername, $mypassword and redirect to file "admin.php"
		session_start(); //Start the session
        $_SESSION['name']= $myusername;
        header("location:admin.php");
    }
    else {
        $msg = "Wrong Username or Password. Please retry";
        header("location:index.php?msg=$msg");
    }
    ob_end_flush();
}
else {
    header("location:index.php?msg=Please enter some username and password");
}
?>