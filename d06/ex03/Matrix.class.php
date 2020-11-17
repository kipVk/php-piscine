<?php

	require_once 'Vertex.class.php';

	class Matrix
	{
		const IDENTITY 		= "IDENTITY";
		const SCALE 		= "SCALE";
		const RX 			= "Ox ROTATION";
		const RY 			= "Oy ROTATION";
		const RZ 			= "Oz ROTATION";
		const TRANSLATION 	= "TRANSLATION";
		const PROJECTION 	= "PROJECTION";

		private $_array;

		private $_matrix = [
			[0, 0, 0, 0],
			[0, 0, 0, 0],
			[0, 0, 0, 0],
			[0, 0, 0, 0]
			];

		private $_crds = ['x', 'y', 'z', 'w'];

		public static $verbose = FALSE;

		public static function doc()
		{
			return file_get_contents('Matrix.doc.txt') . PHP_EOL;
		}

		public function __toString()
		{
			$str = "M | vtcX | vtcY | vtcZ | vtxO" . PHP_EOL;
			$str .= "-----------------------------";
			foreach (range(0, count($this->_matrix) - 1) as $i)
			{
				$str .= PHP_EOL . "{$this->_crds[$i]}";
				foreach (range(0, count($this->_matrix[$i]) - 1) as $j)
					$str .= " | " . number_format($this->_matrix[$i][$j], 
						2, ".", "");
			}
			return $str;
		}

		public function __construct(array $array)
		{
			if (!isset($array['preset']) || !in_array($array['preset'], 
				[self::IDENTITY, self::SCALE, self::RX, self::RY, 
				self::RZ, self::TRANSLATION, self::PROJECTION]))
					return FALSE;
			if ($array['preset'] === self::SCALE && !isset($array['scale']))
				return FALSE;
			if (in_array($array['preset'], [self::RY, self::RX, self::RZ]) 
				&& !isset($array['angle']))
				return FALSE;
			if ($array['preset'] === self::TRANSLATION
				&& (!isset($array['vtc']) || !($array['vtc'] instanceof Vector)))
				return FALSE;
			if ($array['preset'] === self::PROJECTION && (!isset($array['fov'])
				|| !isset($array['ratio']) || !isset($array['near'])
				|| !isset($array['far'])))
				return FALSE;

			$this->_array = $array;
			$function = "p" . str_replace(' ', '', ucwords(strtolower($array['preset'])));
			$this->{$function}($array);
			if (self::$verbose && !isset($array['silent']))
				echo "Matrix " . $array['preset'] . 
					($array['preset'] !== self::IDENTITY ? " preset" : "") .
					" instance constructed" . PHP_EOL;
		}

		public function __destruct()
		{
			if (self::$verbose && !isset($array['silent']))
				echo "Matrix instance destructed" . PHP_EOL;
		}
		
		private function pIdentity()
		{
			$this->_matrix[0][0] = 1;
			$this->_matrix[1][1] = 1;
			$this->_matrix[2][2] = 1;
			$this->_matrix[3][3] = 1;
		}
	}
?>