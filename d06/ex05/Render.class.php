<?php

	require_once 'Vertex.class.php';
	require_once 'Triangle.class.php';
	
	class Render
	{
		const VERTEX 	= 'VERTEX';
		const EDGE 		= 'EDGE';
		const RASTERIZE = 'RASTERIZE';

		private $_width;
		private $_height;
		private $_filename;

		public static $verbose = FALSE;
		
		public static function doc()
		{
			return file_get_contents('Render.doc.txt') . PHP_EOL;
		}

		public function __construct($info)
		{
			if (!isset($info['width']) || !isset($info['height'])
				|| !isset($info['filename']))
				return FALSE;
			$this->_width = $info['width'];
			$this->_height = $info['height'];
			$this->_filename = $info['filename'];
			if (self::$verbose)
				echo "Render instance constructed" . PHP_EOL;
		}

		public function __destruct()
		{
			if (self::$verbose)
				echo "Render instance destructed" . PHP_EOL;
		}

		public function renderVertex(Vertex $screenVertex)
		{

		}

		public function renderTriangle(Triangle $triandle, $mode)
		{

		}

		public function develop()
		{

		}
	}
?>