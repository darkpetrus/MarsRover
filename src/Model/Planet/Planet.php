<?php

namespace MarsRover\Model\Planet;

use MarsRover\Model\Map\Map;

class Planet
{
    private $MinSquare;

    public function getMinSquare(): Map
    {
        return $this->MinSquare;
    }

    private $MaxSquare;

    public function getMaxSquare(): Map
    {
        return $this->MaxSquare;
    }

    public function __construct(Map $MaxSquareMap)
    {
        $this->MinSquare = new Map(0, 0);
        $this->MaxSquare = $MaxSquareMap;
    }
}
