<?php require_once("includes/db.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>

<?php
if(isset($_GET['id'])){
  $searchQueryParameter=$_GET['id'];
  global $connectingDB;
  $sql= "DELETE FROM contacts WHERE cid='$searchQueryParameter' ";
  $execute=$connectingDB->query($sql);
  if($execute){
    $_SESSION["SuccessMessage"]= "Contact deleted successfully.";
    redirect_to("contacts.php");
  }else{
    $_SESSION["ErrorMessage"]= "Something went wrong! Try again.";
    redirect_to("contacts.php");
  }
}
 ?>