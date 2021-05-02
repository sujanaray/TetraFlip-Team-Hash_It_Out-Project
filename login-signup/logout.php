<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>

<?php

  $_SESSION["UserID"]=null ;
  $_SESSION["UserName"]=null ;
  session_destroy();
  header("Location: login.php");
  exit;

 ?>