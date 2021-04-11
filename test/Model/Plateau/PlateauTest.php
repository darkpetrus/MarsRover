<?php

namespace MarsRover\Test\Model\Planet;

use MarsRover\Model\Map\Map;
use MarsRover\Model\Planet\Planet;
use PHPUnit\Framework\TestCase;

class PlanetTest extends TestCase
{
    public function testHaveMinMapToXAxis()
    {
        $Map = new Map("3", "8");
        $Planet = new Planet($Map);
        $this->assertSame(0, $Planet->getMinSquare()->getX());
    }

    public function testHaveMinMapToYAxis()
    {
        $Map = new Map("5", "7");
        $Planet = new Planet($Map);
        $this->assertSame(0, $Planet->getMinSquare()->getY());
    }

    public function testHaveMaxMapToXAxis()
    {
        $Map = new Map("9", "35");
        $Planet = new Planet($Map);
        $this->assertSame(9, $Planet->getMaxSquare()->getX());
    }

    public function testHaveMaxMapToYAxis()
    {
        $Map = new Map("27", "6");
        $Planet = new Planet($Map);
        $this->assertSame(6, $Planet->getMaxSquare()->getY());
    }
}
