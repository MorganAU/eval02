<?php
	$aData = [
	    ['prenom' => 'Louise',  'note' => 16],
	    ['prenom' => 'Emma',    'note' => 18],
	    ['prenom' => 'Gabriel', 'note' => 5],
	    ['prenom' => 'Jules',   'note' => 11],
	    ['prenom' => 'Alice',   'note' => 2],
	    ['prenom' => 'Manon',   'note' => 12],
	    ['prenom' => 'Emmanuel',    'note' => 13],
	    ['prenom' => 'Arthur',  'note' => 0],
	    ['prenom' => 'Lucas',   'note' => 15],
	    ['prenom' => 'Louis',   'note' => 10],
	    ['prenom' => 'Hugo',    'note' => 9]
	];

	$nNumExercice = $argv[1] ?? 0;
	
	
	if ($argc < 2) {
		die ('Vous n\'avez pas saisi d\'exercice --help pour plus d\'infos');
	}

	if (($nNumExercice>0) && ($nNumExercice<=10)) {
    	
    	$sFonction = "exercice" . sprintf("%02d", $nNumExercice);

    	$res = switchFunction($sFonction, $argc, $argv, $aData);
    		
    		
    } else if ($argv[1] == '--help') {
    	require 'help.php';
    	$res = $help;

	} else {
    	die("exercice $nNumExercice inexistant");
	}
	


function switchFunction($sFunction, $iArgc, $aArgv, $array_data) {
	if ( function_exists($sFunction) ) {
    			switch ($sFunction) {
					case 'exercice01':
					if (argcProcess($iArgc, 4, 1)) {
    					$result = $sFunction($iArgc, $aArgv, $array_data);
    				}
					break;

					case 'exercice02':
					if (argcProcess($iArgc, 3, 2)) {
    					$result = $sFunction($iArgc, $aArgv, $array_data);
    				}
					break;
		
					case 'exercice03':
					if (argcProcess($iArgc, 3, 2)) {
    					$result = $sFunction($iArgc, $aArgv, $array_data);
    				}
					break;
		
					case 'exercice04':
					if (argcProcess($iArgc, 4, 1)) {
    					$result = $sFunction($iArgc, $aArgv, $array_data);
    				}
					break;

					case 'exercice05':
					if (argcProcess($iArgc, 3, 4)) {
    					$result = $sFunction($iArgc, $aArgv, $array_data);
    				}
					break;

					case 'exercice06':
					if (argcProcess($iArgc, 2, 3)) {
    					$result = $sFunction();
    				}
					break;
		
					case 'exercice07':
					if (argcProcess($iArgc, 2, 3)) {
    					$result = $sFunction();
    				}
					break;
		
					case 'exercice08':
					if (argcProcess($iArgc, 3, 5)) {
    					$result = $sFunction($iArgc, $aArgv);
    				}
					break;
		
					case 'exercice09':
					if (argcProcess($iArgc, 2, 3)) {
    					$result = $sFunction();
    				}
					break;
		
					case 'exercice10':
					if (argcProcess($iArgc, 2, 3)) {
    					$result = $sFunction();
    				}
					break;
		
					default:
						$sFunction();
					break;
				}
    		} else {
        		die( "fonction " . $sFunction . " non implémentée");
    		}

    		return $result;

}



function argcProcess($iNumberOccurence, $iNumberWish, $iNumber) {
	if ($iNumberWish != $iNumberOccurence) {
	    die(require('error.php'));
	} else {
		return 1;
	}

}



function exercice01($iArgc, $aArgv, $aData) {
	
	$stack = array( "prenom" => $aArgv[2], 
					"note" => $aArgv[3]);

	if(!is_numeric($aArgv[2]) && is_numeric($aArgv[3])) {
		array_push($aData, $stack);
		return $aData;
	} else {
		return 'Typing error';
	}

}



function exercice02($iArgc, $aArgv, $aData) {
	$aName = array();
	$iIndexValue;

    $aName = array_column($aData, 'prenom');
    
	$key = array_search($aArgv[2], $aName);

	if ($key !== false) {
		return $aData[$key];
	} else {
		die('Cette élève n\'existe pas dans notre base');
	}

}



function exercice03($iArgc, $aArgv, $aData) {
	$aName = array();
	$iIndexValue;

    $aName = array_column($aData, 'prenom');
    
	$key = array_search($aArgv[2], $aName);

	if ($key !== false) {
		unset($aData[$key]);
		$aData = array_values($aData);
		return $aData;
	} else {
		die('Cette élève n\'existe pas dans notre base');
	}

}



function exercice04($iArgc, $aArgv, $aData) {
	$aName = array();
	$iIndexValue;

    $aName = array_column($aData, 'prenom');
    
	$key = array_search($aArgv[2], $aName);

	if ($key !== false) {
		unset($aData[$key]['note']);
		$aData[$key] = array( 'prenom' => $aName[$key],
					'note' => $aArgv[3]);
		$aData = array_values($aData);

		return $aData;
		
	} else {
		die('Cette élève n\'existe pas dans notre base');
	}

}



function exercice05($iArgc, $aArgv, $aData) {
	$sPath = 'resources/' . $aArgv[2];
	$cDelimiter = ',';

	$file_csv = fopen($sPath, 'w+');

	fprintf($file_csv, chr(0xEF).chr(0xBB).chr(0xBF));

	foreach($aData as $row) {
		fputcsv($file_csv, $row, $cDelimiter);
	}

	fclose($file_csv);


	return 'File create in resources folder';

}



function exercice06() {
	require_once 'json/json_process.php';
	require_once 'define.php';

	$dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=' . DB_CHARSET;
			
	try {
		// Instanciation d'un objet PDO
		$pdo = new PDO($dsn, DB_LOGIN, DB_PASS,
					[PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
	}
			
	//Gestion des erreurs
	catch (PDOException $exception) {
		echo 'Error : ' . $exception->getMessage() . "\n";
		echo 'N° : ' . $exception->getCode() . "\n";
		die('Database connect error');
	}

	require 'database/create_database.php';
	require 'database/change_database.php';
	require 'database/delete_table.php';
	require 'database/create_table.php';

	return 'database \'exercices\' and table \'resultat_exam\' created';

}



function exercice07() {
	require 'database/sql_connect.php';
	require 'database/import_csv.php';

}



function exercice08($iArgc, $aArgv) {
	$iTotal;

	switch ($aArgv[2]) {
		case 'mini':
			require 'score_process/score_min.php';
			$iTotal = getNoteMini();
		break;
		
		case 'maxi':
			require 'score_process/score_max.php';
			$iTotal = getNoteMaxi();
		break;
		
		case 'moyenne':
			require 'score_process/average.php';
			$iTotal = getMoyenneClasse();
		break;
		
		default:
			return 'Error : Choose between <mini> <maxi> <moyenne>';
		break;
	}
	return $iTotal;

}
	


function exercice09() {
	require_once 'database/sql_connect.php';
	require 'score_process/score_min.php';
	require 'score_process/score_max.php';
	require 'score_process/average.php';
	require 'database/select_by_scores.php';

	$files_array = array();
		$i = 0;

		$scores_array = array();
		$i = 0;

		while ($aStudent = $aTable->fetch())
		{
			if ($aStudent->score_test < 10) {
				$comment = 'Examen échoué';
			} else {
				$comment = 'Reçu a l\'examen';
			}

	         $files_array[$i] = getStudentFiles( $aStudent->name,
	        									$aStudent->score_test,
	        									$comment,
	        									getNoteMaxi(), 
	        									getNoteMini(),
	        									getMoyenneClasse());

			$i++;
		}
		
		$aTable->closeCursor();

		return $files_array;

}



function exercice10() {
	require_once 'database/sql_connect.php';
	require 'score_process/score_min.php';
	require 'score_process/score_max.php';
	require 'score_process/average.php';
	require 'database/select_by_names.php';

	$files_array = array();
		$i = 0;

		$scores_array = array();
		$i = 0;

		while ($aStudent = $aTable->fetch())
		{
			if ($aStudent->score_test < 10) {
				$comment = 'Examen échoué';
			} else {
				$comment = 'Reçu a l\'examen';
			}

	        $files_array[$i] = getStudentFiles( $aStudent->name,
	        									$aStudent->score_test,
	        									$comment,
	        									getNoteMaxi(), 
	        									getNoteMini(),
	        									getMoyenneClasse());

			$i++;
		}
		
		$aTable->closeCursor();

		

		return $files_array;

}



function getStudentFiles($sName, $iScore, $sComment, $iHighScore, $iLowScore, $iAverageScore) {

	$sStudentFiles = '
	Meilleure note : ' . $iHighScore . '
        Note mini:       ' . $iLowScore . '
        Moyenne classe:  ' . $iAverageScore . '

**************************************************************
* ' . $sName . '          * ' . $iScore . ' * '. $sComment . '                       *
**************************************************************
* AAAAAAAAAAAAAAA *  NN  * CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC *
**************************************************************';

	return $sStudentFiles;

}



    /*
Consignes habituelles (git, coding standards...)
soignez l'organisation du programme: utilisez des fonctions, séparez votre code en plusieurs fichiers
Utiliser le design pattern MVC
Gérer toutes les erreurs qui pourraient survenir pendant l'éxécution (accès à un fichier inexistant, execution correcte des requetes SQL...)
Votre code devra être livré sur un repo github

1 - créer une fonction pour ajouter un élève dans le tableau $aData
    exemple d'appel ajouterEleve( ['prenom'=>'Marie', 'note'=>14] )
2 - Créer une fonction pour lire la note d'un élève
    exemple d'appel lireNote( 'Emma' )
3 - Créer une fonction pour supprimer un élève dans le tableau $aData
    exemple d'appel supprimerEleve( 'Gabriel' )
4 - Créer une fonction pour modifier la note d'un élève
    exemple d'appel modifierNote( 'Manon', 12 )
5 - Ecrire les données du tableau $aData dans un fichier csv nommé "resultat_exam.csv"
6 - Créer une table 'resultat_exam' dans une database 'exercices' permettant de stocker les données de l'exercice.
    Créer la base de données, l'utilisateur se connectant à la base et ses droits d'accès avec phpMyAdmin
    Créer la table automatiquement grace à une fonction PHP, si la table existait la supprimer.
    Il est indispensable de créer les index utiles pour les requetes que vous utiliserez (clé primaire et autres index)
    Lire la configuration de la base de données à partir d'un fichier json "config-db.json"
    7 - Lire le fichier csv puis enregistrer les données dans la table 'resultat_exam'
    Controler la validité des données que vous intégrez dans la table
    Controler l'unicité des données insérées
8 - Afficher la moyenne de la classe, la note mini, la note maxi
    ces données proviendront des fonctions suivantes: getMoyenneClasse(), getNoteMini(), getNoteMaxi()
9 - Lire la table 'resultat_exam' puis afficher les résultats dans l'ordre descendant des notes obtenues  formatés comme ci-dessous
10 - Lire la table 'resultat_exam' puis afficher les résultats dans l'ordre alphabétique formatés comme ci-dessous

Mise en forme affichage:

        Meilleure note : 99
        Note mini:       99
        Moyenne classe:  99.99

**************************************************************
* Prénom          * Note * Commentaire                       *
**************************************************************
* AAAAAAAAAAAAAAA *  NN  * CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC *
**************************************************************

Le champ commentaire contient:
    "Reçu a l'examen" si l'élève a la moyenne
    "Examen échoué" sinon*/
