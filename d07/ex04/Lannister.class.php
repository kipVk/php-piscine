<?php
	class Lannister
	{
		public function sleepWith($person)
		{
			if ($person instanceof Lannister)
				echo "Not even if I'm drunk !" . PHP_EOL;
			else
				echo "Let's do this." . PHP_EOL;
		}
	}
?>