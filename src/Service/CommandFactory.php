<?php

namespace MarsRover\Service;

use MarsRover\Model\Command\CommandTypes;
use MarsRover\Model\Command\Command;
use MarsRover\Model\Command\Forward;
use MarsRover\Model\Command\TurnLeft;
use MarsRover\Model\Command\TurnRight;

class CommandFactory
{
    public function createCommand(string $commandType): Command
    {
        switch ($commandType) {
            case CommandTypes::FORWARD:
                return new Forward();
            case CommandTypes::TURN_RIGHT:
                return new TurnRight();
            case CommandTypes::TURN_LEFT:
                return new TurnLeft();
            default:
                throw new \Exception("Invalid Command Type, given: " . $commandType);
        }
    }
}
