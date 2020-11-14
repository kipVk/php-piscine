<?php
	require_once("auth.php");
	session_start();

	$pwd_file 	= "../private/passwd";
	$login 		= $_REQUEST["login"];
	$pwd		= $_REQUEST["passwd"];
	$submit		= $_REQUEST["submit"];

	if ($login && $pwd && auth($login, $pwd))
		$_SESSION["loggued_on_user"] = $login;
	else
	{
		$_SESSION["loggued_on_user"] = "";
		header("Location: index.html");
		echo "ERROR\n";
		return ;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Chat</title>
		<style>
			body
			{
				font-family: Arial;
				background-color: rgb(57, 59, 63);
				color: white;
			}
			iframe
			{
				border: 1px solid #cad1d6;
				border-radius: 3px;
				width: 100%;
				margin: 0 auto;
				background-color: #bacad8;
			}
		</style>
	</head>
	<body>
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
</html>