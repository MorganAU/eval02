<?php

	$q = 'SELECT * FROM resultat_exam
			ORDER BY name ASC';
	$aTable=$pdo->query($q);
	if ($aTable === FALSE) {
		die($pdo->errorInfo());

	}


	$aTable->setFetchMode(PDO::FETCH_OBJ);