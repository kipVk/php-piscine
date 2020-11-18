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
		private $_img;
		private $_background;

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
			$this->_img = imagecreate($this->_width, $this->_height);
			$_background = imagecolorallocate($this->_img, 0, 0, 0);
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
			$color = imagecolorallocate($this->_img,
				$screenVertex->getColor()->red,
				$screenVertex->getColor()->green,
				$screenVertex->getColor()->blue);
			imagesetpixel($this->_img, $screenVertex->getX() +
				$this->_width / 2, $screenVertex->getY() +
				$this->_height / 2, $color);
		}

		public function renderTriangle(Triangle $triangle, $mode)
		{
			$this->renderVertex($triangle->getA()->opposite());
			$this->renderVertex($triangle->getB()->opposite());
			$this->renderVertex($triangle->getC()->opposite());
		}

		public function develop()
		{

		}

		public function renderMesh($mesh, $mode)
		{
			if ($mode == Self::EDGE) {
				foreach ($mesh as $k => $triangle)
				{
					$this->renderEdge($triangle[0], $triangle[1]);
					$this->renderEdge($triangle[1], $triangle[2]);
					$this->renderEdge($triangle[2], $triangle[0]);
				}
			}
			else
			{
				foreach ($mesh as $k => $triangle)
				{
					$this->renderVertex($triangle[0]);
					$this->renderVertex($triangle[1]);
					$this->renderVertex($triangle[2]);
				}
			}
		}

		public function renderEdge(Vertex $a, Vertex $b)
		{
			$color1 = imagecolorallocate($this->_image,
				$a->getColor()->red,
				$b->getColor()->green,
				$b->getColor()->blue);
			$color2 = imagecolorallocate($this->_image,
				$b->getColor()->red,
				$b->getColor()->green,
				$b->getColor()->blue);
			imagesetstyle($this->_image, array($color1, $color2));
			imageline($this->_image,
				$a->getX() + $this->_width / 2, $a->getY() + $this->_height / 2,
				$b->getX() + $this->_width / 2, $b->getY() + $this->_height / 2,
				IMG_COLOR_STYLED);
		}
	}
?>