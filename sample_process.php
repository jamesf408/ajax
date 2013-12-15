<?php
	require_once('connection.php');

	// var_dump($_POST);
	$query = "SELECT * FROM leads 
			  WHERE first_name LIKE '". $_POST['name'] ."%' 
			  OR last_name LIKE '". $_POST['name'] ."%'";

	$users = fetchAll($connection, $query);
	$data = array();
	$html = "
	<table>
		<thead>
			<tr>
				<th>User ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Registered Datetime</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
		";

	foreach ($users as $user) {
		$html .= 
			'<tr>
				 <td>' . $user['id']  . '</td>
			  	 <td>' . $user['first_name']  . '</td>
			  	 <td>' . $user['last_name']  . '</td>
			  	 <td>' . $user['registered_datetime']  . '</td>
			  	 <td>' . $user['email']  . '</td>
			</tr>';
	}
	$html .= '</tbody></table>';

	$data['html'] = $html;
	echo json_encode($data);
?>