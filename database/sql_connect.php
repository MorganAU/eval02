<?php
	require_once 'json/json_process.php';
	require_once 'define.php';
	
	// Création d'un DSN (Data Source Name)
	$dsn = 'mysql:host=' . DB_HOST . ';
			dbname=' . DB_NAME . ';
			port=' . DB_PORT . ';
			charset=' . DB_CHARSET;
			
	try {
		// Instanciation d'un objet PDO
		$pdo = new PDO($dsn, DB_LOGIN, DB_PASS,
					[PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
	}
			
	//Gestion des erreurs
	catch (PDOException $exception) {
		echo 'Error : ' . $exception->getMessage() . "\n";
		echo 'N° : ' . $exception->getCode() . "\n";
		exit('Database connect error');
	}

