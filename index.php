<?php

	class Elevator
	{

		private $door;
		private $elevator = 'elevator';

		private function openDoor()
		{
			$this->door = 'open';
		}

		private function closeDoor()
		{
			$this->door = 'close';
		}

		private function checkWeight($weight)
		{
			if($weight<480){
				$result = 'ok';
			}else{
				$result = 'overweight';
			}
			return $result;
		}

		public function help()
		{
			$status = "call dispatcher";
			return $status;
		}

		public function move($direction, $numFloors, $weight)
		{
			if($direction == 'up' or $direction == 'down'){
				$weightRes = $this->checkWeight($weight);
				if($weightRes=='ok'){
					$this->closeDoor();
					$result = 'Move the '.$this->elevator.' '.$direction.' '.$numFloors.' floors.';
					$this->openDoor();
				}else{
					$result = $weightRes;
				}
			}else{
				$result = 'Wrong direction!';
			}

			return $result;
		}
	}


	$moveElevator = new Elevator;
	echo $moveElevator->move('up',4,200);

?>