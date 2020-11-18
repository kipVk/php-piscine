<?php

	class Render
	{
		const VERTEX 	= 'VERTEX';
		const EDGE 		= 'EDGE';
		const RASTERIZE = 'RASTERIZE';
		
		public static $verbose = FALSE;
		
		public static function doc()
		{
			return file_get_contents('Render.doc.txt') . PHP_EOL;
		}
	}
?>