<?php require_once("includes/db.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>

<?php
  if(isset($_SESSION["UserID"])){
    redirect_to("dashboard.php");
  }

  if(isset($_POST["submit"])){
    $username=$_POST['uname'];
    $password=$_POST['password'];
    if(empty($username)|| empty($password)){
      $_SESSION["ErrorMessage"]="All the fields must be filled.";
      redirect_to("login.php");
    }else{
      $found_account = login_attempt($username,$password);
      if($found_account){
        $_SESSION["UserID"]=$found_account['uid'] ;
        $_SESSION["UserName"]=$found_account['username'] ;
        $_SESSION["Name"]=$found_account['name'] ;
        $_SESSION["SuccessMessage"]="Welcome Back ".$_SESSION["UserName"];
        redirect_to("dashboard.php");
      }else{
        $_SESSION["ErrorMessage"]="Incorrect username/password.";
        redirect_to("login.php");
      }
    }
  }
 ?>
 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <title> Login </title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/bb2e1a2580.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="main-w3layouts wrapper">
		<h1> Login Form</h1>
		<?php
			echo success_message();
			echo error_message();
		?>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="uname" placeholder="Username" required="">
					<br /> <br />
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<br />
					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input type="submit" value="LOGIN" name="submit">
				</form>
				<p>Don't have an Account? <a href="register.php"> Register Now!</a></p>
			</div>
		</div>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
