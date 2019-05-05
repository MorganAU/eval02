<?php
	$q = 'DROP TABLE IF EXISTS resultat_exam';
	$statut=$pdo->exec($q);
	if ($statut === FALSE) {
		die($pdo->errorInfo());

	}