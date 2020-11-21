<?php
	$csv = file_get_contents('list.csv');
	$csv = preg_replace('/' . $_GET['id'] . ';.*\n/', '', $csv);
	file_put_contents('list.csv', $csv);
?>