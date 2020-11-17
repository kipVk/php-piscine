<?php

	require_once 'Vertex.class.php';

	class Vector 
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 0.0;
		public static $dest;
		public static $orig;
		
		public static $verbose = FALSE;

		public static function doc()
		{
			return file_get_contents('Vector.doc.txt') . PHP_EOL;
		}

		public function __toString()
		{
			return "Vector( x: " . number_format($this->_x, 2, ".", "") .
				", y: " . number_format($this->_y, 2, ".", "") .
				", z:" . number_format($this->_z, 2, ".", "") .
				", w:" . number_format($this->_w, 2, ".", "") .
				" )";
		}

		public function __construct(array $vert)
		{
			if ((!isset($vert['dest']) || !($vert['dest'] instanceof Vertex)) || 
				(isset($vert['orig']) && !($vert['orig'] instanceof Vertex)))
				return FALSE;
			if (!isset($vert['orig']))
				$vert['orig'] = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0));
			$this->_x = $vert['dest']->getX() - $vert['orig']->getX();
			$this->_y = $vert['dest']->getY() - $vert['orig']->getY();
			$this->_z = $vert['dest']->getZ() - $vert['orig']->getZ();
			if (self::$verbose)
			{
				echo $this->__toString() . " constructed" . PHP_EOL;
			}
		}

		public function __destruct()
		{
			if (self::$verbose) {
				echo $this->__toString() . " destructed" . PHP_EOL;
			}
		}

		public function magnitude()
		{
			$magnitude = sqrt($this->_x **2 + $this->_y **2 + $this->_z **2);
				return $magnitude;
		}

		public function normalize()
		{
			$len = $this->magnitude();
			if ($len <= 0)
				$len = 1;
			return new Vector(array('dest' => new Vertex([
					'x' => $this->_x / $len,
					'y' => $this->_y / $len,
					'z' => $this->_z / $len])));
		}

		public function add(Vector $rhs)
		{
			return new Vector(array('dest' => new Vertex([
				'x' => $this->_x + $rhs->_x,
				'y' => $this->_y + $rhs->_y,
				'z' => $this->_z + $rhs->_z])));
		}

		public function sub(Vector $rhs)
		{
			return new Vector(array('dest' => new Vertex([
				'x' => $this->_x - $rhs->_x,
				'y' => $this->_y - $rhs->_y,
				'z' => $this->_z - $rhs->_z])));
		}

		public function opposite()
		{
			return new Vector(array('dest' => new Vertex([
				'x' => $this->_x * -1,
				'y' => $this->_y * -1,
				'z' => $this->_z * -1])));
		}

		public function scalarProduct($k)
		{
			return new Vector(array('dest' => new Vertex([
				'x' => $this->_x * $k,
				'y' => $this->_y * $k,
				'z' => $this->_z * $k])));
		}

		public function dotProduct(Vector $rhs)
		{
			return ($this->_x * $rhs->_x 
				+  $this->_y * $rhs->_y 
				+ $this->_z * $rhs->_z);
		}


	}
?>