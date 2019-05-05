<?php
	echo 'Unpossible to execute : ';
	switch ($iNumber) {
		case 1:
			echo $iNumber . ' => Parameters error <numéro exercice> <nom> <note>';
		break;

		case 2:
			echo $iNumber . ' => Parameters error <numéro exercice> <nom>';
		break;
		
		case 3:
			echo $iNumber . ' => Parameters error <numéro exercice>';
		break;
		
		case 4:
			echo $iNumber . ' => Parameters error <numéro exercice> <nom du fichier>';
		break;
		
		case 5:
			echo $iNumber . ' => Parameters error <numéro exercice> <mini|maxi|moyenne>';
		break;
		
		default:
			echo 'Unknow error';
		break;
	}
	echo "\n";
	echo '--help for more informations';