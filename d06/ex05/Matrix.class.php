<?php

	require_once 'Vertex.class.php';
	require_once 'Vector.class.php';

	class Matrix
	{
		const TRANSLATION	= "TRANSLATION";
		const PROJECTION	= "PROJECTION";
		const IDENTITY		= "IDENTITY";
		const SCALE 		= "SCALE";
		const RX 			= "Ox ROTATION";
		const RY 			= "Oy ROTATION";
		const RZ 			= "Oz ROTATION";
		
		public static $verbose = FALSE;

		private $_array;

		private $_matrix = [
			[0, 0, 0, 0],
			[0, 0, 0, 0],
			[0, 0, 0, 0],
			[0, 0, 0, 0]
			];

		private $_crds = ['x', 'y', 'z', 'w'];

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

		public function __construct(array $info)
		{
			if (!isset($info['preset']) || !in_array($info['preset'], 
				[self::IDENTITY, self::SCALE, self::RX, self::RY, 
				self::RZ, self::TRANSLATION, self::PROJECTION]))
					return FALSE;
			if ($info['preset'] === self::SCALE && !isset($info['scale']))
				return FALSE;
			if (in_array($info['preset'], [self::RY, self::RX, self::RZ]) 
				&& !isset($info['angle']))
				return FALSE;
			if ($info['preset'] === self::TRANSLATION
				&& (!isset($info['vtc']) || !($info['vtc'] instanceof Vector)))
				return FALSE;
			if ($info['preset'] === self::PROJECTION && (!isset($info['fov'])
				|| !isset($info['ratio']) || !isset($info['near'])
				|| !isset($info['far'])))
				return FALSE;

			$this->_array = $info;
			$function = "p" . str_replace(' ', '',
				ucwords(strtolower($info['preset'])));
			$this->{$function}($info);
			if (self::$verbose && !isset($info['noPrint']))
			{
				if ($info['preset'] == self::IDENTITY)
					echo "Matrix " . $info['preset'] . " instance constructed" .
					PHP_EOL;
				else
					echo "Matrix " . $info['preset'] . " preset" .
						" instance constructed" . PHP_EOL;
			}
		}

		public function __destruct()
		{
			if (self::$verbose && !isset($info['noPrint']))
				echo "Matrix instance destructed" . PHP_EOL;
		}
		
		private function pIdentity()
		{
			$this->_matrix[0][0] = 1;
			$this->_matrix[1][1] = 1;
			$this->_matrix[2][2] = 1;
			$this->_matrix[3][3] = 1;
		}

		private function pTranslation($info)
		{
			$this->pIdentity();
			$this->_matrix[0][3] = $info['vtc']->getX();
			$this->_matrix[1][3] = $info['vtc']->getY();
			$this->_matrix[2][3] = $info['vtc']->getZ();
		}

		private function pScale($info)
		{
			$this->_matrix[0][0] = $info['scale'];
			$this->_matrix[1][1] = $info['scale'];
			$this->_matrix[2][2] = $info['scale'];
			$this->_matrix[3][3] = 1;
		}

		private function pOxRotation($info)
		{
			$this->_matrix[0][0] = 1;
			$this->_matrix[1][1] = cos($info['angle']);
			$this->_matrix[1][2] = -1 * sin($info['angle']);
			$this->_matrix[2][1] = sin($info['angle']);
			$this->_matrix[2][2] = cos($info['angle']);
			$this->_matrix[3][3] = 1;
		}

		private function pOyRotation($info)
		{
			$this->_matrix[0][0] = cos($info['angle']);;
			$this->_matrix[0][2] = sin($info['angle']);
			$this->_matrix[1][1] = 1;
			$this->_matrix[2][0] = -1 * sin($info['angle']);
			$this->_matrix[2][2] = cos($info['angle']);
			$this->_matrix[3][3] = 1;
		}

		private function pOzRotation($info)
		{
			$this->_matrix[0][0] = cos($info['angle']);;
			$this->_matrix[0][1] = -1 * sin($info['angle']);
			$this->_matrix[1][0] = sin($info['angle']);
			$this->_matrix[1][1] = cos($info['angle']);
			$this->_matrix[2][2] = 1;
			$this->_matrix[3][3] = 1;
		}

		private function pProjection($info)
		{
			$persp = 1 / tan(($info['fov'] / 2 * M_PI / 180));
			$this->_matrix[0][0] = $persp / $info['ratio'];
			$this->_matrix[1][1] = $persp;
			$this->_matrix[2][2] = (($info['near'] + $info['far'])
				/ ($info['near'] - $info['far']));
			$this->_matrix[2][3] = ((2 * $info['near'] * $info['far'])
				/ ($info['near'] - $info['far']));
			$this->_matrix[3][2] = -1;
			$this->_matrix[3][3] = 0;
		}

		public function mult($rhs)
		{
			$result = array();
			foreach (range(0, count($this->_matrix) - 1) as $i)
			{
				$result[$i] = array();
				foreach (range(0, count($this->_matrix[$i]) -1) as $j)
				{
					$sum = 0;
					foreach (range(0, count($rhs->_matrix) - 1) as $k)
					{
						$sum += $this->_matrix[$i][$k] * $rhs->_matrix[$k][$j];
					}
					$result[$i][$j] = $sum;
				}
			}
			$mresult = new Matrix(array('preset' => Matrix::IDENTITY,
				'noPrint' => TRUE));
			$mresult->_matrix = $result;
			return $mresult;
		}

		public function transformVertex($vtx)
		{
			$vertx = $vtx->getX() * $this->_matrix[0][0] +
				$vtx->getY() * $this->_matrix[0][1] +
				$vtx->getZ() * $this->_matrix[0][2] +
				$vtx->getW() * $this->_matrix[0][3];
			$verty = $vtx->getX() * $this->_matrix[1][0] +
				$vtx->getY() * $this->_matrix[1][1] +
				$vtx->getZ() * $this->_matrix[1][2] +
				$vtx->getW() * $this->_matrix[1][3];
			$vertz = $vtx->getX() * $this->_matrix[2][0] +
				$vtx->getY() * $this->_matrix[2][1] +
				$vtx->getZ() * $this->_matrix[2][2] +
				$vtx->getW() * $this->_matrix[2][3];
			$vertw = $vtx->getX() * $this->_matrix[3][0] +
				$vtx->getY() * $this->_matrix[3][1] +
				$vtx->getZ() * $this->_matrix[3][2] +
				$vtx->getW() * $this->_matrix[3][3];
			$new_vert = new Vertex(array('x' => $vertx, 'y' => $verty, 
				'z' => $vertz, 'w' => $vertw));
			return $new_vert;
		}

		public function transpose()
		{
			$trans = new Matrix(array('preset' => Matrix::IDENTITY,
				'noPrint' => TRUE));
			foreach (range(0, 3) as $i)
			{
				foreach (range(0, 3) as $j)
					$trans->_matrix[$i][$j] = $this->_matrix[$j][$i];
			}
			return $trans;
		}
	}
?>