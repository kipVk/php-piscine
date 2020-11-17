<?php

	require_once 'Color.class.php';

	class Vertex 
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 1.0;
		private $_color;

		public static $verbose = FALSE;

		public static function doc()
		{
			return file_get_contents('Vertex.doc.txt') . PHP_EOL;
		}

		public function __toString()
		{
			if (!self::$verbose)
				return "Vertex( x: " . number_format($this->_x, 2, ".", "") .
					", y: " . number_format($this->_y, 2, ".", "") .
					", z:" . number_format($this->_z, 2, ".", "") .
					", w:" . number_format($this->_w, 2, ".", "") .
					" )";
			else
				return "Vertex( x: " . number_format($this->_x, 2, ".", "") .
					", y: " . number_format($this->_y, 2, ".", "") .
					", z:" . number_format($this->_z, 2, ".", "") .
					", w:" . number_format($this->_w, 2, ".", "") .
					", " . $this->_color .
					" )";
		}

		public function __construct(array $vert)
		{
			if (!isset($vert['x']) || !isset($vert['y']) || !isset($vert['z']))
				return FALSE;
			if (isset($vert['w']))
				$this->_w = $vert['w'];
			if (isset($vert['color']))
				$this->_color = $vert['color'];
			else
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
			$this->_x = $vert['x'];
			$this->_y = $vert['y'];
			$this->_z = $vert['z'];
			if (self::$verbose)
			{
				echo $this->__toString() . " constructed" . PHP_EOL;
			}
		}

		public function __destruct()
		{
			if (self::$verbose)
			{
				echo $this->__toString() . " destructed" . PHP_EOL;
			}
		}

		public function setX($newx)
		{
			$this->_x = $newx;
		}

		public function setY($newy)
		{
			$this->_y = $newy;
		}

		public function setZ($newz)
		{
			$this->_z = $newz;
		}

		public function setW($neww)
		{
			$this->_w = $neww;
		}

		public function setColor(Color $newcolor)
		{
			$this->_color = $newcolor;
		}

		public function getX()
		{
			return $this->_x;
		}

		public function getY()
		{
			return $this->_y;
		}

		public function getZ()
		{
			return $this->_z;
		}

		public function getW()
		{
			return $this->_w;
		}

		public function getColor()
		{
			return $this->_color;
		}
	}
?>