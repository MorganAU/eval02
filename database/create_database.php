<?php
	$q = 'CREATE DATABASE IF NOT EXISTS `' . DB_NAME . '` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
	$statut=$pdo->exec($q);
	if ($statut === FALSE) {
		die($pdo->errorInfo());

	}
