<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if(isset($_POST['email']) && isset($_POST['password'])){
	$email = htmlspecialchars($_POST["email"]);
	$password = htmlspecialchars($_POST["password"]);
	if(!empty($_POST['email']) && !empty($_POST['password'])){

		// TODO

		// Force user connection to access dashboard
		userConnection($db, 'git@initiation.com', 'password');
		if(userConnection($db, $email, $password) == true){
			header('Location: dashboard.php');
		}
		else{
			$error = 'Mauvais identifiants';
		}
		


	}else{
		$error = 'Champs requis !';
	}
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';