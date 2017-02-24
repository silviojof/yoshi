<?php

	function connect_db() {

		static $conn;

		if(!isset($conn)) {
			$config = parse_ini_file('config.ini');
			$conn = mysqli_connect('localhost', $config['username'], $config['password'], $config['database']);

      date_default_timezone_set('Canada/Pacific');
      mysqli_set_charset($conn, 'utf8');

			if(!$conn) {
				echo mysqli_connect_error();
				return;
			} else {
				return $conn;
			}
		} else {
			return $conn;
		}
	}

	function close_db($c) {
		if($c) {
			mysqli_close($c);
		} else {
			echo '<p>Failed to connect</p>';
		}
	}

?>
