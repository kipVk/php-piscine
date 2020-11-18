<?php
	class NightsWatch
	{
		private $nightWatch = array();

		public function recruit($recruit)
		{
			$this->$nightWatch[] = $recruit;
		}
		
		public function fight()
		{
			foreach ($this->$nightWatch as $nightwatcher)
			{
				if ($nightwatcher instanceof IFighter
					&& method_exists($nightwatcher, 'fight'))
					$nightwatcher->fight();
			}
		}
	}
?>