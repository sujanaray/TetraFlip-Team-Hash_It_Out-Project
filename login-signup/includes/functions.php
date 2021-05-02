<?php require_once("includes/db.php") ?>

<?php

function redirect_to($new_location){
  header("Location:".$new_location);
  exit;
}

function userNameExistanceCheck($username){
  global $connectingDB;
  $sql="SELECT username FROM users WHERE username='$username' ";
  $stmt=$connectingDB->prepare($sql);
  $stmt->bindValue(':username',$username);
  $stmt->execute();
  $result = $stmt->rowcount();
  if($result==1){
    return true;
  } else{
    return false;
  }
}

function login_attempt($username,$password){
  global $connectingDB;
  $sql="SELECT * FROM users WHERE username=:userName AND password=:passWord LIMIT 1";
  $stmt=$connectingDB->prepare($sql);
  $stmt->bindValue(':userName',$username);
  $stmt->bindValue(':passWord',$password);
  $stmt->execute();
  $result=$stmt->rowcount();
  if($result==1){
    $fetch_account = $stmt->fetch();
    return $fetch_account;
  }else{
    return null;
  }
}

function login_confirm(){
  if(isset($_SESSION['UserID'])){
    return true;
  }else{
    $_SESSION["ErrorMessage"]= "Login Required";
    redirect_to("login.php");
  }
}

?>
