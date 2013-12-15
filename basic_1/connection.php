<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_NAME', 'postit');

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(mysqli_connect_errno($connection)) {
		echo 'There was an error connecting to the database.';
		echo mysqli_connect_errno();
	}
	
	function fetchAll($connection, $query) {
		$data = array();

		$result = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}
?>
