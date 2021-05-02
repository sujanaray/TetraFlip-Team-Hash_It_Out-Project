<?php require_once("includes/db.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>
<?php
$_SESSION["trackingURL"]=$_SERVER["PHP_SELF"];
 login_confirm();
 $id = $_SESSION["UserID"];
?>
<?php
	if(isset($_POST["submit"])) {
		$ph = $_POST['phone'];
		//$msg = $_POST['msg'];
		if(empty($ph)){
			redirect_to("contacts.php");
		} else {
		$sql="INSERT INTO contacts(ph_no, uid)";
		$sql.=" VALUES (:phone, :id) ";
		$stmt=$connectingDB->prepare($sql);
		$stmt->bindValue(':phone',$ph);
		$stmt->bindValue(':id',$id);
		$execute=$stmt->execute();
		redirect_to("contacts.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Contact details </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Add custom CSS here -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body> 
    <div id="wrapper">      
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li class="sidebar-brand"><a href="#">Menus</a></li>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="contacts.php">Add Contacts</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Contact</a></li>
		  <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
          
      <!-- Page content -->
      <div id="page-content-wrapper">
        <div class="content-header">
          <h1>
            <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
            Emergency Assist
          </h1>      
		  </div>
		  <div class="contents">
			<form method ="post" action="contacts.php">
			   <div style="margin-left:20px;"> Add Emergency Contacts</div>
				<input type="number" name="phone" placeholder="Add Contact" required="" style="margin-left:20px; height: 35px; margin-bottom: 20px;" />
			   <!-- <div style="margin-left:20px;"> Enter Emergency Message</div>
			   <input type="textarea" name="msg" placeholder="Enter Message" style="margin-left:20px; height: 35px;" /> -->
			   <br/>
			   <input type="submit" value="Submit" name="submit" style="margin-left:20px; height: 35px; width: 80px; text-align: centre;" />
		   </form>
	   </div> <br>
	   <div class="content-header">
		<h1> Contacts saved: </h1>
		<ul>
		<?php 
			global $connectingDB;
			$sq = "SELECT * FROM contacts WHERE uid=$id";
			$stm = $connectingDB->query($sq);
			while ($dataRows=$stm->fetch()) {
              $ph_no=$dataRows['ph_no'];
		?>
		<li><?php echo $ph_no; ?> </li>
		<?php }?>
		</ul>
	   </div>
	</div>
	</div>

             <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Custom JavaScript for the Menu Toggle -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script>
  </body>
</html>