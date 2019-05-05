<?php
	$q = 'USE ' . DB_NAME;
	
	$statut=$pdo->exec($q);
	if ($statut === FALSE) {
		print_r($pdo->errorInfo());
	}