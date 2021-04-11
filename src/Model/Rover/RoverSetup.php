<?php

namespace MarsRover\Model\Rover;

use MarsRover\Model\Map\Map;
use MarsRover\Model\Direction\Direction;

class RoverSetup
{
    private $Map;

    public function getMap(): Map
    {
        return $this->Map;
    }

    private $Direction;

    public function getDirection(): Direction
    {
        return $this->Direction;
    }

    public function __construct(string $currentSetupInput)
    {
        $currentSetup = explode(" ", $currentSetupInput);
        $this->Map = new Map($currentSetup[0], $currentSetup[1]);
        $this->Direction = new Direction($currentSetup[2]);
    }

    public function toString(): string
    {
        return $this->Map->getX() . " " . $this->Map->getY() . " " . $this->Direction->getOrientation();
    }
}
