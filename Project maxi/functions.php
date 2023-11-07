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
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		
	</head>
	<body>
  
    	<div class="logo">
    	
		
		<img src="Original.png" alt="" style="height: 13rem; max-width: auto; margin: auto;">
		
	
		
		
    	</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>
<!-- 	<a href="read.php"><i class="fas fa-address-book"></i></a> -->
