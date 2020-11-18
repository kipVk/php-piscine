<?php

	class Triangle
	{
		private $_a;
		private $_b;
		private $_c;

		public static $verbose = FALSE;
		
		public static function doc()
		{
			return file_get_contents('Triangle.doc.txt') . PHP_EOL;
		}

		public function __construct($a, $b, $c)
		{
			if (!isset($a) || !isset($b) || !isset($c) || !$a instanceof Vertex
				|| !$b instanceof Vertex || !$c instanceof Vertex)
				return FALSE;
			$this->_a = $a;
			$this->_b = $b;
			$this->_c = $c;
			if (self::$verbose)
				echo "Triangle instance constructed" . PHP_EOL;
		}

		public function __destruct()
		{
			if (self::$verbose)
				echo "Triangle instance destructed" . PHP_EOL;
		}
	}
?>