
<?php

	session_start();
	function ft_get_chats($chat_file)
	{
		if (file_exists($chat_file))
		{
			$content = file_get_contents($chat_file, LOCK_EX);
			$chats = unserialize($content);
			return $chats;
		}
		return FALSE;
	}

	$chat_file = "../private/chat";
	$msg       = $_REQUEST["msg"];
	if ($_SESSION["loggued_on_user"] === "")
	{
		echo "ERROR\n";
		die();
	}
	if (isset($msg))
	{
		$msg = array(
			"login" => $_SESSION["loggued_on_user"], 
			"time" => time(), 
			"msg" => $msg
		);
		$chats = ft_get_chats($chat_file);
		$chats[] = $msg;
		if (file_put_contents($chat_file, serialize($chats), LOCK_EX) === FALSE)
		{
			header("Location: .");
			echo "ERROR\n";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Message</title>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
		<style>
			body
			{
				font-family: Arial;
				background-color: rgb(57, 59, 63);
				color: white;
			}
			form
			{
				border-radius: 3px;
				margin: 0 auto;
			}
			input[type=text]
			{
				width: 83%;
				display: inline-block;
				border: 1px solid #61666b;
				box-sizing: border-box;
				border-radius: 3px;
			}
			label
			{
				font-family: Arial;
			}
		</style>
	</head>
	<body>
		<form method="post" action="speak.php">
			<label for="msg">Message: </label>
			<input type="text" name="msg" id="msg" autofocus/></br></br>
		</form>
	</body>
</html>