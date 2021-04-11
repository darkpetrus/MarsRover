<?php

namespace MarsRover\Model\Command;

use MarsRover\Model\Direction\Direction;
use MarsRover\Model\Rover\Rover;
use MarsRover\Model\Rover\RoverSetup;

class TurnLeft extends Rotatable implements Command
{
    public function execute(Rover $Rover): void
    {
        $CurrentSetup = $Rover->getSetup();
        $currentXPosition = $CurrentSetup->getMap()->getX();
        $currentYPosition = $CurrentSetup->getMap()->getY();
        $currentOrientation = $CurrentSetup->getDirection()->getOrientation();
        $NextOrientation = $this->rotateFrom($currentOrientation);

        switch ($NextOrientation) {
            case Direction::NORTH:
                $newInputSetup = $currentXPosition . " " . ($currentYPosition + 1) . " " . $NextOrientation;
                break;
            case Direction::WEST:
                $newInputSetup = ($currentXPosition - 1) . " " . $currentYPosition . " " . $NextOrientation;
                break;
            case Direction::EAST:
                $newInputSetup = ($currentXPosition + 1) . " " . $currentYPosition . " " . $NextOrientation;
                break;
            case Direction::SOUTH:
                $newInputSetup = $currentXPosition . " " . ($currentYPosition - 1) . " " . $NextOrientation;
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

    /**
     * @codeCoverageIgnore
     */
    protected function rotateFrom($currentDirection): string
    {
        switch ($currentDirection) {
            case Direction::NORTH:
                return Direction::WEST;
            case Direction::WEST:
                return Direction::SOUTH;
            case Direction::SOUTH:
                return Direction::EAST;
            case Direction::EAST:
                return Direction::NORTH;
        }
    }
}
