<?php 

session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);    
ini_set( 'display_errors' , 1 );  


require ('RabbitMQ/loginRabbitMQ.php');#contains login client function

//include ("functions.php");  // Check if that the directory?

// initializing variables
$user = ""; // Comment this ?
$errors = array(); 
$logs = array();


////Log user in from login page
if (isset($_POST['login'])) {

	//global $db;
	$user = $_POST [ "user" ] ;
	$user=trim($user);
	//$user= mysqli_real_escape_string( $db, $user);

	$pass = $_POST [ "pass" ] ;
	$pass=trim($pass);
	//$pass= mysqli_real_escape_string( $db, $pass);

  	//$user = getdata("user");
  	//$pass = getdata ("pass");

  	if (empty($user)) { array_push($errors, "Username is required"); }
  	if (empty($pass)) { array_push($errors, "Password is required"); }

  	if (count($errors) == 0) {

		$response = login($user,$pass);

		if ($response != false)#login successful!
		{
 			$_SESSION['success'] = "You are now logged in"; // Maybe put it in Rabbit Server
      			$_SESSION['username'] = $user;
      			array_push($logs,"Login->"."  "."User:".$user."   "."Password:".$pass);
      			header('location:../Website/bootstrap/website.php');
		}

		else
		{
			array_push($errors, "Wrong Username/Password combination");
		}

	}
}

// If the register button is clicked , Register user
if (isset($_POST['register'])) {

	$user = $_POST [ "user" ] ;
	$user=trim($user);

	$pass = $_POST [ "pass" ] ;
	$pass=trim($pass);

	$pass2 = $_POST [ "pass2" ] ;
	$pass2=trim($pass2);

	//$user = getdata("user");
	//$pass = getdata ("pass");
	//$pass_2 = getdata ("pass2");

	//ensure that the form is correctly filled ...
 	// by adding (array_push()) corresponding error unto $errors array
 	if (empty($user)) { array_push($errors, "Username is required"); }
 	if (empty($pass)) { array_push($errors, "Password is required"); }
 	if ($pass != $pass2) {array_push($errors, "The two passwords do not match");}

 	//If there are no erros, register user to database
  	if (count($errors) == 0) {

  		$response = register($user,$pass);

  		if ($response != false)#login successful!
		{
 		$_SESSION['success'] = "You are now logged in"; // Maybe put it in Rabbit Server
      		$_SESSION['username'] = $user;
      	 	array_push($logs,"Register->"."  "."User:".$user."    "."Password:".$pass);
      		header('location:../Website/bootstrap/website.php');

		}

		else
		{

			$errorMSG= "Account name already exists, please try again";
			echo "<p>$errorMSG</p>";
		}
  	}
}


if (isset($_GET['logout'])) {

  array_push($logs,"Logout");//Not working?
  
  session_destroy();
  unset($_SESSION['username']);
  header('location:../login.php'); // ????

  }



?>
