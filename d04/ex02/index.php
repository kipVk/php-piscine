<!DOCTYPE html>
<head>
	<title>Change Password</title>
</head>
<body>
	<form action="modif.php" method="POST">
		Login: <input type="text" name="login" value="" />
		<br/>
		Old Password: <input type="password" name="oldpw" value="" />
        <br/>
        New Password: <input type="password" name="newpw" value="" />
		<br/>
		<input type="submit" name="submit" value="OK" />
	</form>
</body>
</html>