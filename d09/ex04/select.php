<?php
	if (file_exists('list.csv'))
	{
		$lines = explode("\n", file_get_contents('list.csv'));
		foreach($lines as $line)
		{
			list($id, $val) = explode(';', $line);
			$todo[$id] = $val;
		}
		echo json_encode($todo);
	}
?>