<?php
	$img = "../img/42.png";
	header("Content-type: image/png");
	readfile($img);
?>