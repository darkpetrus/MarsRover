<?php

namespace MarsRover\Model\Command;

use Exception;
use MarsRover\Model\Direction\Direction;
use MarsRover\Model\Rover\Rover;
use MarsRover\Model\Rover\RoverSetup;
use MarsRover\Model\Command\ObjectDetector;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class Forward implements Command
{
    public function execute(Rover $Rover): void
    {
        $CurrentSetup = $Rover->getSetup();
        $currentXPosition = $CurrentSetup->getMap()->getX();
        $currentYPosition = $CurrentSetup->getMap()->getY();
        $currentOrientation = $CurrentSetup->getDirection()->getOrientation();

        switch ($currentOrientation) {
            case Direction::NORTH:
                $newInputSetup = $currentXPosition . " " . ($currentYPosition + 1) . " " . $currentOrientation;
                break;
            case Direction::WEST:
                $newInputSetup = ($currentXPosition - 1) . " " . $currentYPosition . " " . $currentOrientation;
                break;
            case Direction::EAST:
                $newInputSetup = ($currentXPosition + 1) . " " . $currentYPosition . " " . $currentOrientation;
                break;
            case Direction::SOUTH:
                $newInputSetup = $currentXPosition . " " . ($currentYPosition - 1) . " " . $currentOrientation;
                break;
        }
        $DetectObject = new ObjectDetector($newInputSetup);
        if (!$DetectObject) {
            $Rover->setSetup(new RoverSetup($newInputSetup));
        } else {
            throw new \Exception("Invalid NewInput, given. Object Detected. Sequence Aborted ");
        }

        return;
    }
}
