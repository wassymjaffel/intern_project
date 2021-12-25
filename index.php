<!DOCTYPE html>
<?php 
session_start();

if(isset($_SESSION['name'])){
    header("location:admin.php");
}
$msg='';
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];  //GET the message
}
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
         @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background: linear-gradient(rgba(246,247,249,0.8), rgba(246,247,249,0.8));
  font-family: 'Open Sans', sans-serif;
}

main {
  height: 100vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content:center;
  align-items: center;
}

.container {
  width: 430px;
}

.tabs {
  background: #575D7E;
  height: 100px;
  width: 100%;
  display: flex;
  align-items: center;
  padding-left: 45px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.tabs span {
  color: rgba(255,255,255,.3);
  font-weight: 400;
  margin-right: 30px;
  cursor: pointer; 
  font-size: 21px;
  line-height: 50px;
}

div .active {
  box-shadow: 0 3px 0 #1059FF;
  color: #ffffff;
}

.sign-in {
  background: linear-gradient( rgba(35,43,85,0.75), rgba(35,43,85,0.95));
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

form {
  width: 100%;
  display: flex;
  flex-direction: column;
  padding-top: 40px;
}

[for="username"], [for="password"] {
  color: rgba(255,255,255,.7);
  font-size: 14px;
  font-weight: 400;
  margin-left: 55px;
  margin-top: 15px;
  margin-bottom: 15px;
}

[type="text"] {
  background: rgba(255,255,255,.2);
  border-radius: 20px;
  margin-left: 45px;
  margin-right: 45px;
  border: 0;
  height: 35px;
  padding-left: 15px;
  color: #fff;
}
[type="text"]:focus {
  outline: none;
}

[type="password"] {
  background: rgba(255,255,255,.2);
  border-radius: 20px;
  margin-left: 45px;
  margin-right: 45px;
  border: 0;
  height: 35px;
  padding-left: 15px;
  color: #fff;
}
[type="password"]:focus {
  outline: none;
}

#password {
  margin-bottom: 15px;
}

[type="checkbox"] {
  display: none;
}

[for="checkbox"] {
  color: rgba(255,255,255,.7);
  font-size: 13px;
  font-weight: 400;
  margin-left: 30px;
  display: flex;
  align-items: center;
  cursor: pointer;
}
.toggle-1 {
  display: inline-block;
}
.toggle-1:before {
  content: "";
  display: inline-block;
  background: rgba(255,255,255,.7);
  position: relative;
  top: 4px;
  left: 27px;
  height: 17px;
  width: 17px;
  border-radius: 50%;
}
.toggle-1:after {
  content: "NO";
  display: inline-flex;
  justify-content: flex-end;
  align-items: center;
  width: 65px;
  height: 30px;
  background: rgba(255,255,255,.2);
  border-radius: 15px;
  margin-right: 20px;
  padding-right: 15px;
  cursor: pointer;
}
.toggle-2 {
  display: none;
}
.toggle-2:before {
  content: "";
  display: inline-block;
  background: #fff;
  position: relative;
  left: 70px;
  top: 4px;
  height: 17px;
  width: 17px;
  border-radius: 50%;
}
.toggle-2:after {
  content: "YES";
  display: inline-flex;
  justify-content: flex-start;
  align-items: center;
  width: 50px;
  height: 30px;
  background: #0F4FE6;
  border-radius: 15px;
  margin-right: 20px;
  padding-right: 15px;
  padding-left: 15px;
  cursor: pointer;
}
.button {
  color: #fff;
  background: rgba(16,89,255, 1);
  border: 0;
  border-radius: 20px;
  margin: 15px 45px 0 45px;
  height: 35px;
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
  letter-spacing: 1px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom:25px;
}
.button:hover {
  background: #0F4FE6;
}

.hr {
  margin: 55px 45px 30px 45px;
  background-color: rgba(255,255,255,.3);
  height: 1px;
}

form a {
  text-align: center;
  text-decoration: none;
  color: rgba(255,255,255,.3);
  font-weight: 400;
  font-size: 14px;
  margin-bottom: 55px;
}
    </style>
</head>
<body>
<main>
  <div class="container">
    <div class="tabs">
      <span class="active">SIGN-IN</span>
    </div>
    <div class="sign-in">
    <?php if($msg!='') echo '<center><p>'.$msg.'</p></center>'; ?>
      <form action="check_login.php" method="post">
        <label for="username">USERNAME</label>
        <input id="username" type="text" name="username">
        <label for="password">PASSWORD</label>
        <input id="password" type="password" name="password">
        <input type="submit" value="SIGN IN" class="button"/>
      </form>
    </div>
  </div>
  </div>
</main> 
</body>
</html>







