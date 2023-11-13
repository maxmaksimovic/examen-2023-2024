<?php

function pdo_connect_mysql() {
	$DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'phpcrud1';
	// Er wordt hier verbinding gemaakt met de beheerder van de database
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// Als er een fout is met de verbinding, stop dan het script en geef de fout weer.
    	exit('Failed to connect to database!');
    }
}

function template_header($title) {}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="bootstrap.min.css">
		
		<script src="https://kit.fontawesome.com/8e01cdcabe.js" crossorigin="anonymous"></script>
	</head>
	<body>
	<div class="center">
    	<div class="logo">
    	
		<div class="container-nav">
		<img src="Original.png" alt="rumih-logo" >

		
		
		<a href="read.php"><i class="fa-solid fa-users-gear fa-xl" style="color: #000000; float: right; padding: 20px;"></i></a>
		
	
		
		
    	</div>
	</div>	
    </nav>

    </body>
</html>
