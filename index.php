<?php

	class Elevator
	{
        private $door;
        private $currentFloor = 5;
        const maxWeight = 480;

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
            return $weight < 480 ? 'ok' : 'overweight';
        }

        public function help()
        {
            $status = 'call dispatcher';
            return $status;
        }

        public function move($numFloors, $weight)
        {
            $weightRes = $this->checkWeight($weight);
            if ($weightRes=='ok') {
                $this->closeDoor();
                $direction = $this->currentFloor <=> $numFloors;
                if($direction == 0) {
                    $result = 'you are already on this floor';
                } elseif ($direction == -1) {
                    $countFlore = $numFloors - $this->currentFloor;
                    $result = 'Move the elevator up '.$countFlore.' floors.';
                } elseif ($direction == 1) {
                    $countFlore = $this->currentFloor - $numFloors;
                    $result = 'Move the elevator down '.$countFlore.' floors.';
                }
                $this->openDoor();
            } else {
                $result = $weightRes;
            }

            return $result;
        }
	}


	$moveElevator = new Elevator;
	echo $moveElevator->move(5,200);

?>