<?php
	$q = 'CREATE TABLE IF NOT EXISTS `resultat_exam` (
				`student_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(20) NOT NULL,
				`score_test` SMALLINT(3) UNSIGNED,
				PRIMARY KEY (student_id)
			)
			ENGINE=InnoDB';
			
	//On execute la requête
	$rows_affected=$pdo->exec($q);
			
	//Gestion si il y a des erreurs
	if ($rows_affected === FALSE) {
		die($pdo->errorInfo());
	}