<?php
	class Color
	{
		public $red;
		public $green;
		public $blue;

		public static $verbose = FALSE;

		public static function doc()
		{
			return file_get_contents('Color.doc.txt') . PHP_EOL;
		}

		public function __toString()
		{
			return "Color( red: " . str_pad($this->red, 3, " ", STR_PAD_LEFT) .
				", green: " . str_pad($this->green, 3, " ", STR_PAD_LEFT) .
				", blue: " . str_pad($this->blue, 3, " ", STR_PAD_LEFT) . " )";
		}

		public function __construct(array $color)
		{
			if (!isset($color['rgb']) && (!isset($color['red'])
				|| !isset($color['green']) || !isset($color['blue'])))
				return FALSE;
			if (isset($color['rgb']))
			{
				$color['red'] = ($color['rgb'] >> 16) & 0xFF;
				$color['green'] = ($color['rgb'] >> 8) & 0xFF;
				$color['blue'] = $color['rgb'] & 0xFF;
			}
			$this->red = intval($color['red']);
			$this->green = intval($color['green']);
			$this->blue = intval($color['blue']);
			if (self::$verbose)
			{
				echo $this->__toString() . " constructed." . PHP_EOL;
			}
		}

		public function __destruct()
		{
			if (self::$verbose)
			{
				echo $this->__toString() . " destructed." . PHP_EOL;
			}
		}
		
		public function add(Color $color)
		{
			$newColor = new Color(['red' => $this->red + $color->red,
				'green' => $this->green + $color->green,
				'blue' => $this->blue + $color->blue]);
			return $newColor;
		}

		public function sub(Color $color)
		{
			$newColor = new Color(['red' => $this->red - $color->red,
				'green' => $this->green - $color->green,
				'blue' => $this->blue - $color->blue]);
			return $newColor;
		}

		public function mult($factor)
		{
			$newColor = new Color(['red' => $this->red * $factor,
				'green' => $this->green * $factor,
				'blue' => $this->blue * $factor]);
			return $newColor;
		}
	}
?>