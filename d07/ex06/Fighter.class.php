<?php
	class Fighter
	{
		public $type;
		
		public function __construct($name)
		{
			$this->type = $name;
		}
		
		protected function fight($target){}
	}
?>