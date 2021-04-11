<?php

namespace MarsRover\Model\Map;

class Map
{
    private $x;

    public function getX(): int
    {
        return $this->x;
    }

    private $y;

    public function getY(): int
    {
        return $this->y;
    }

    public function __construct($x, $y)
    {
        $this->x = (int)$x;
        $this->y = (int)$y;
    }
}