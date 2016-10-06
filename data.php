<?php

	require("functions.php");

	if(!isset ($_SESSION["userId"])){
		header("Location: login.php");
	}
	
	if (isset($_GET["logout"])){
		
		session_destroy();
		
		header("Location: login.php");
	}
	
	
	$notice = "";
	// mõlemad login vormi väljad on täidetud
	if (	isset($_POST["note"]) && 
			isset($_POST["color"]) && 
			!empty($_POST["note"]) && 
			!empty($_POST["color"]) 
	) {
		$notice = note($_POST["note"], $_POST["color"]);
	}
	
	
	
?>

<h1>Data</h1>
<p>	
	Tere tulemast <?=$_SESSION["userEmail"];?> !
	<a href="?logout=1"> Logi välja </a>


</p>

<!DOCTYPE html>
<html>
	<head>
		<title>Märkmed</title>
	</head>
	<body>

		
		<h2>Märkmed<h2>
		<form method="POST">
			
			<label>Tekst</label><br>
			
			<input name="note" type="text">
						
			<br><br>
			
			<label>Värv</label><br>
			
			<input name="color" type="color">
			
			<br><br>			
						
			<input type="submit">
		
		</form>
