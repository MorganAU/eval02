<?php
	$q = 'SELECT score_test FROM resultat_exam';
	$aScore=$pdo->query($q);
	if ($aScore === FALSE) {
		die($pdo->errorInfo());

	}

	$aScore->setFetchMode(PDO::FETCH_OBJ);