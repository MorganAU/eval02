<?php
	$q = 'SELECT * FROM resultat_exam
			ORDER BY score_test DESC';
	$aTable=$pdo->query($q);
	if ($aTable === FALSE) {
		die($pdo->errorInfo());

	}


	$aTable->setFetchMode(PDO::FETCH_OBJ);