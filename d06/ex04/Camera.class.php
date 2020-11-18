<?php

	require_once 'Vertex.class.php';
	require_once 'Vector.class.php';
	require_once 'Matrix.class.php';

	class Camera
	{
		private $_origin;
		private $_ratio;

		private $_tT;
		private $_tR;
		private $_tRMult;
		private $_proj;
		
		public static $verbose = FALSE;

		public static function doc()
		{
			return file_get_contents('Camera.doc.txt') . PHP_EOL;
		}

		public function __toString()
		{
			$str = "Camera( " . PHP_EOL .
				"+ Origine: {$this->_origin->__toString()}" . PHP_EOL .
				"+ tT:" . PHP_EOL . $this->_tT->__toString() . PHP_EOL .
				"+ tR:" . PHP_EOL . $this->_tR->__toString() . PHP_EOL .
				"+ tR->mult( tT ):" . PHP_EOL . $this->_tRMult->__toString() .
				PHP_EOL . "+ Proj:" . PHP_EOL . $this->_proj->__toString() .
				PHP_EOL . ")";
			return $str;
		}

		public function __construct(array $info)
		{
			if (!isset($info['origin']) || !($info['origin'] instanceof Vertex))
				return FALSE;
			if (!isset($info['orientation'])
				|| !($info['orientation'] instanceof Matrix))
				return FALSE;
			if (!isset($info['fov']) || !isset($info['near'])
				|| !isset($info['far']))
				return FALSE;
			if (isset($info['ratio']))
				$this->_ratio = $info['ratio'];
			elseif (isset($info['width']) && isset($info['height']))
				$this->_ratio = $info['width'] / $info['height'];
			else
				return FALSE;
			$this->_origin = $info['origin'];
			$x = $this->_origin->getX() * -1;
			$y = $this->_origin->getY() * -1;
			$z = $this->_origin->getZ() * -1;
			$i_vertex = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
			$i_vector = new Vector(array('dest' => $i_vertex));
			$this->_tT  = new Matrix(array('preset' => Matrix::TRANSLATION,
				'vtc' => $i_vector));
			$this->_tR = $info['orientation']->transpose();
			$this->_tRMult = $this->_tR->mult($this->_tT);
			$this->_proj = new Matrix(array('preset' => Matrix::PROJECTION,
				'fov' => $info['fov'], 'ratio' => $this->_ratio,
				'near' => $info['near'], 'far' => $info['far']));
			if (self::$verbose)
				echo "Camera instance constructed" . PHP_EOL;
		}

		public function __destruct()
		{
			if (self::$verbose)
				echo "Camera instance destructed" . PHP_EOL;
		}
	}
?>