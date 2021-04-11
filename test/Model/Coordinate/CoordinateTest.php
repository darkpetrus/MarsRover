<?php

namespace MarsRover\Test\Model\Map;

use MarsRover\Model\Map\Map;
use PHPUnit\Framework\TestCase;

class MapTest extends TestCase
{
    public function testCanHandleInputReturningIntegerToXPosition()
    {
        $Map = new Map("2", "3");
        $this->assertSame(2, $Map->getX());
    }

    public function testCanHandleInputReturningIntegerToYPosition()
    {
        $Map = new Map("2", "3");
        $this->assertSame(3, $Map->getY());
    }
}
