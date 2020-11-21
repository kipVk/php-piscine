
<?php
	file_put_contents('list.csv', $_GET['id'] . ';' . $_GET['value'] .
		PHP_EOL, FILE_APPEND);
?>