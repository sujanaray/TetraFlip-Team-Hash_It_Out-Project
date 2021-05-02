<?php require_once("includes/db.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>

<?php
if(isset($_POST["submit"])){
  $username=$_POST["uname"];
  $name=$_POST["name"];
  $mail=$_POST["email"];
  $contact_no=$_POST["phone"];
  $password=$_POST["password1"];
  $confirmPassword=$_POST["password2"];

  if(empty($username) || empty($contact_no) || empty($name) || empty($mail) || empty($password) || empty($confirmPassword)){
    $_SESSION["ErrorMessage"] = "All fields must be filled.";
    redirect_to("register.php");
  }elseif (strlen($password)<6) {
    $_SESSION["ErrorMessage"] = "Password should be greater than 5 characters.";
    redirect_to("register.php");
  }elseif (strlen($password!==$confirmPassword)) {
    $_SESSION["ErrorMessage"] = "Passwords do not match.";
    redirect_to("register.php");
  }elseif (userNameExistanceCheck($username)) {
    $_SESSION["ErrorMessage"] = "Username Exists.";
    redirect_to("register.php");
  }else {
    //entering data into database
    $sql="INSERT INTO users(username, name, email, password, contact_no)";
    $sql.=" VALUES (:username, :name, :mail, :password, :ph_no) ";
    $stmt=$connectingDB->prepare($sql);
    $stmt->bindValue(':username',$username);
	$stmt->bindValue(':name',$name);
	$stmt->bindValue(':mail',$mail);
    $stmt->bindValue(':password',$password);
    $stmt->bindValue(':ph_no',$contact_no);
    $execute=$stmt->execute();

    if($execute){
      $_SESSION["SuccessMessage"]="Successful Registration";
      redirect_to("login.php");
    }
    else{
      $_SESSION["ErrorMessage"]="Something went wrong! Try Again.";
      redirect_to("register.php");
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
    <title> SignUp </title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/bb2e1a2580.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="main-w3layouts wrapper">
		<h1> SignUp Form</h1>
		<?php
			echo success_message();
			echo error_message();
		?>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="register.php" method="post">
					<input class="text" type="text" name="uname" placeholder="Username" required>
					<input class="text w3lpass" type="text" name="name" placeholder="Name" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text w3lpass" type="number" name="phone" placeholder="Phone Number" required="" minlength="10">
					<input class="text" type="password" name="password1" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="password2" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP" name="submit">
				</form>
				<p>Already have an Account? <a href="login.php"> Login Here </a></p>
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
