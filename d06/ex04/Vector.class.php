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
			return "Vector( x:" . number_format($this->_x, 2, ".", "") .
				", y:" . number_format($this->_y, 2, ".", "") .
				", z:" . number_format($this->_z, 2, ".", "") .
				", w:" . number_format($this->_w, 2, ".", "") .
				" )";
		}

		public function __construct(array $vert)
		{
			if ((!isset($vert['dest']) || !($vert['dest'] instanceof Vertex))
				|| (isset($vert['orig']) && !($vert['orig'] instanceof Vertex)))
				return FALSE;
			if (!isset($vert['orig']))
				$vert['orig'] = new Vertex(array('x' => 0.0, 'y' => 0.0,
					'z' => 0.0));
			$this->_x = $vert['dest']->getX() - $vert['orig']->getX();
			$this->_y = $vert['dest']->getY() - $vert['orig']->getY();
			$this->_z = $vert['dest']->getZ() - $vert['orig']->getZ();
			if (self::$verbose)
				echo $this->__toString() . " constructed" . PHP_EOL;
		}

		public function __destruct()
		{
			if (self::$verbose)
				echo $this->__toString() . " destructed" . PHP_EOL;
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

		public function magnitude()
		{
			$magn = sqrt($this->_x **2 + $this->_y **2 + $this->_z **2);
				return $magn;
		}

		public function normalize()
		{
			$len = $this->magnitude();
			if ($len <= 0)
				$len = 1;
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x / $len,
				'y' => $this->_y / $len,
				'z' => $this->_z / $len])));
			return $newVector;
		}

		public function add(Vector $rhs)
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x + $rhs->_x,
				'y' => $this->_y + $rhs->_y,
				'z' => $this->_z + $rhs->_z])));
			return $newVector;
		}

		public function sub(Vector $rhs)
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x - $rhs->_x,
				'y' => $this->_y - $rhs->_y,
				'z' => $this->_z - $rhs->_z])));
			return $newVector;
		}

		public function opposite()
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x * -1,
				'y' => $this->_y * -1,
				'z' => $this->_z * -1])));
			return $newVector;
		}

		public function scalarProduct($k)
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x * $k,
				'y' => $this->_y * $k,
				'z' => $this->_z * $k])));
			return $newVector;
		}

		public function dotProduct(Vector $rhs)
		{
			$product = $this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z
				* $rhs->_z;
			return $product;
		}

		public function cos(Vector $rhs)
		{
			$mag1 = $this->magnitude();
			$mag2 = $rhs->magnitude();
			if ($mag1 == 1 || $mag2 == 1 || $mag1 == intval(0)
				|| $mag2 == intval(0))
				return (intval(0));
			else
				return ($this->dotProduct($rhs) /
					($this->magnitude() * $rhs->magnitude()));
		}
		
		public function crossProduct(Vector $rhs)
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_y * $rhs->_z - $this->_z * $rhs->_y,
				'y' => $this->_z * $rhs->_x - $this->_x * $rhs->_z,
				'z' => $this->_x * $rhs->_y - $this->_y * $rhs->_x])));
			return $newVector;
		}
	}
?>