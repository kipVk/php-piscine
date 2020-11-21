
<?php
	if (file_exists("list.csv") && isset($_GET['id']) && isset($_GET['value']))
	{
		file_put_contents('list.csv', $_GET['id'] . ';' . $_GET['value'] .
			PHP_EOL, FILE_APPEND);
	}
?>