<?php
	require_once('connection.php');

	$query = "INSERT INTO posts (description, created_at, updated_at)
			  VALUES ('" . mysqli_real_escape_string($connection, $_POST['message']) . "', NOW(), NOW())";
	mysqli_query($connection, $query);

	$query = "SELECT * FROM posts
			  ORDER BY id DESC";

	$posts = fetchAll($connection, $query);
	$data = array();
	$html = '';
	foreach ($posts as $post) {
		$html .= '<div>' . $post['description'] . '</div>';
	}
	$data['contents'] = $html;
	echo json_encode($data);
?>