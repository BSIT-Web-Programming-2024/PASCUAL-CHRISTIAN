<?php
	$name = $_POST['name'];
	$email =$_POST['email'];
	$message = $_POST['message'];


	// Database connection
	$connect = new mysqli('localhost','root','','pascual');
	if($connect->connect_error){
		echo "$connect->connect_error";
		die("Connection Failed : ". $connect->connect_error);
	} else {
		$stmt = $connect->prepare("INSERT INTO list (name, email, message) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $message);
		$execval = $stmt->execute();    
		echo $execval;
		echo " 	Inserted!";
		$stmt->close();
		$connect->close();
	}