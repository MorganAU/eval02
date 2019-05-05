<?php
	$q = "LOAD DATA LOCAL INFILE 'resources/resultat_exam.csv'
			INTO TABLE resultat_exam
			FIELDS TERMINATED BY ','
			LINES TERMINATED BY '\\n'
			IGNORE 1 LINES
			(name, score_test)";


	//On execute la requête
	$rows_affected=$pdo->query($q);
			
	//Gestion si il y a des erreurs
	if ($rows_affected === FALSE) {
		die($pdo->errorInfo());
	}
