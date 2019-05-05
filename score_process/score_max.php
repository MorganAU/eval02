<?php
	function getNoteMaxi() {
		require 'database/sql_connect.php';
		require 'database/select_scores.php';

		$scores_array = array();
		$i = 0;

		while ($iScore = $aScore->fetch())
		{
	        $scores_array[$i] = $iScore->score_test;
			$i++;
		}
		
		$aScore->closeCursor();


		return max($scores_array);
	}