<?php

	define('DB_HOST', $parsed_json->{'configs'}->{'host'});
	define('DB_NAME', $parsed_json->{'configs'}->{'dbname'});
	define('DB_PORT', $parsed_json->{'configs'}->{'port'});
	define('DB_CHARSET', $parsed_json->{'configs'}->{'charset'});
	define('DB_LOGIN', $parsed_json->{'login'});
	define('DB_PASS', $parsed_json->{'pass'});
