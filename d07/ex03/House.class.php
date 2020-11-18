<?php
	abstract class House {
		abstract function getHouseName();
	
		abstract function getHouseMotto();
	
		abstract function getHouseSeat();
	
		public function introduce()
		{
			$house = $this->getHouseName();
			$motto = $this->getHouseMotto();
			$seat = $this->getHouseSeat();
			echo "House {$house} of {$seat} : \"{$motto}\"" . PHP_EOL;
		}
	}
?>