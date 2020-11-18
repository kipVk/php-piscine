<?php
	class UnholyFactory
	{
		private $army = array();

		private function type_exists($soldier)
		{
			foreach ($this->army as $absorbed)
			{
				if ($absorbed->type == $soldier->type)
					return TRUE;
			}
			return FALSE;
		}

		public function absorb($soldier)
		{
			if ($soldier instanceof Fighter)
			{
				if ($this->type_exists($soldier))
					echo "(Factory already absorbed a fighter of type " .
						"{$soldier->type})" . PHP_EOL;
				else
				{ 
					$this->army[] = $soldier;
					echo "(Factory absorbed a fighter of type " .
						"{$soldier->type})" . PHP_EOL;
				}
			}
			else
				echo "(Factory can't absorb this, it's not a fighter)" .
					PHP_EOL;
		}
		
		public function fight()
		{
			foreach ($this->$army as $soldier)
			{
				if ($soldier instanceof IFighter
					&& method_exists($soldier, 'fight'))
					$soldier->fight();
			}
		}

		public function fabricate($rf)
		{
			foreach ($this->army as $newSoldier)
			{
				if ($newSoldier->type == $rf)
				{
					echo "(Factory fabricates a fighter of type " .
						"{$newSoldier->type})" . PHP_EOL;
					return $newSoldier;
				}
			}
			echo "(Factory hasn't absorbed any fighter of type {$rf})" .
				PHP_EOL;
			return null;
		}
	}
?>