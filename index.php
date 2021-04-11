<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use \MarsRover\Model\Map\Map;
use \MarsRover\Model\Planet\Planet;
use \MarsRover\Model\Rover\RoverSquad;
use \MarsRover\Model\Rover\RoverSetup;
use \MarsRover\Model\Rover\Rover;
use \MarsRover\Service\CommandsInputParser;

if (STDIN) {
    $planetInputLine = fgets(STDIN);
    $planetMap = explode(" ", $planetInputLine);
    $Map = new Map($planetMap[0], $planetMap[1]);
    $Planet = new Planet($Map);

    $RoverSquad = new RoverSquad();
    $inputCommandNumber = 0;
    $squadCounter = 0;

    while (($input = fgets(STDIN)) !== false) {
        if ($inputCommandNumber == 0) {
            if ($RoverSquad->offsetExists($squadCounter) == false) {
                $Rover = new Rover();
                $Rover->setSetup(new RoverSetup($input));
                $RoverSquad->offsetSet($squadCounter, $Rover);
            }
            $inputCommandNumber++;
        } elseif ($inputCommandNumber == 1 && $RoverSquad->offsetExists($squadCounter)) {
            $Rover = $RoverSquad->offsetGet($squadCounter);
            $Rover->setCommands((new CommandsInputParser($input))->getCommandsCollection());
            $inputCommandNumber = 0;
            $squadCounter++;
        }
    }

    $RoverSquad->execute();
    echo $RoverSquad->getRoversSetupAsString();
}
