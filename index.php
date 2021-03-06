<?php
  class Elevator
  {
    const MAX_WEIGHT = 480;

    private $doorStatus = 'close';
    private $currentFloor = 5;

    private function openDoor()
    {
      $this->doorStatus = 'open';
    }

    private function closeDoor()
    {
      $this->doorStatus = 'close';
    }

    private function checkWeight($weight)
    {
      return $weight < self::MAX_WEIGHT ? 'ok' : 'overweight';
    }

    public function help()
    {
      return 'call dispatcher';
    }

    public function move($floor, $weight)
    {
      $weightRes = $this->checkWeight($weight);
      
      if ($weightRes === 'ok')
      {
        $this->closeDoor();
        $direction = $this->currentFloor <=> $floor;

        if ($direction === 0)
        {
          $result = 'You are already on this floor';
        } elseif ($direction === -1) {
          $countFlore = $floor - $this->currentFloor;
          $result = 'Move the elevator up ' . $countFlore . ' floors.';
        } elseif ($direction === 1) {
          $countFlore = $this->currentFloor - $floor;
          $result = 'Move the elevator down ' . $countFlore . ' floors.';
        }

        $this->currentFloor = $floor;
        $this->openDoor();
      } else {
        $result = $weightRes;
      }

      return $result;
    }
  }


  $elevator = new Elevator();
  echo $elevator->move(4, 200);

?>