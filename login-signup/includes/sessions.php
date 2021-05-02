<?php

session_start();

function error_message(){
  if(isset($_SESSION["ErrorMessage"])){
    $output="<div class=\"alert alert-danger\" style=\"width: 500px; text-align: centre; margin-left:500px; margin-top: 20px;\">";
    $output.=htmlentities($_SESSION["ErrorMessage"]);
    $output.="</div>";
    $_SESSION["ErrorMessage"]=null;
    return $output;
  }
}

function success_message(){
  if(isset($_SESSION['SuccessMessage'])){
    $output="<div class=\"alert alert-success\" style=\"width: 500px; text-align: centre; margin-left:500px; margin-top: 20px;\">";
	$output.=htmlentities($_SESSION["SuccessMessage"])."</div>";
    $_SESSION["SuccessMessage"]=null;
    return $output;
  }
}

 ?>
