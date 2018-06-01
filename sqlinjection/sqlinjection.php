<?php

	$db = new PDO('mysql:host=127.0.0.1;dbname=website', 'root', '');

	if (isset($_POST['email'])) {

		$email = $_POST['email'];

		//Wrong QUERY

		// $user = $db->query("SELECT * FROM users WHERE email = '
		// 	{$email}'");


		// Right Query
		$user = $db->prepare("SELECT * FROM users WHERE email = :email");

		$user->execute([
			'email' => $email,
		]);
		
		if ($user->rowCount()) {
			die($email);
		}

	}

?>
<html>
<head>
	<meta charset="utf-8">
	<title>SQL Injection</title>
</head>
<body>
	<form action="sqlinjection.php" method="post" autocomplete="off">
		<label for="email">Email Address</label>
		<input type="text" name="email" id="email">
		<input type="submit" value="Recover">
	</form>
</body>
</html>