<?php
		mysqli_report(MYSQLI_REPORT_STRICT);
		$source = array();
		$source['host'] = "localhost";
		$source['user'] = "root";
		$source['password'] = "";
		$source['database'] = "pweb";
		$database = null;

		try {
			$database = new mysqli($source['host'],$source['user'],$source['password'],$source['database']);
		} catch (Exception $e) {
			$database = false;
			echo "Servizio database non disponibile al momento";
			die;
		}
	return $database;
?>