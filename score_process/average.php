<?php
	function getMoyenneClasse() {
		require 'database/sql_connect.php';
		require 'database/select_scores.php';

		$iSumOfScores = $iCount = 0;

		while ($iScore = $aScore->fetch())
		{
	        $iSumOfScores += $iScore->score_test;
			$iCount++;
		}
		
		$aScore->closeCursor();

		return $iSumOfScores / $iCount;
	}

	