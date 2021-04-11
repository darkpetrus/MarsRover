<?php

declare(strict_types=1);

namespace MarsRover\Test\Service;

use MarsRover\Model\Command\CommandsCollection;
use MarsRover\Service\CommandsInputParser;
use PHPUnit\Framework\TestCase;

class CommandsInputParserTest extends TestCase
{
    public function testCanParseValidInputToCommandsCollection()
    {
        $Parser = new CommandsInputParser("FRFLFF");
        $this->assertTrue($Parser->getCommandsCollection() instanceof CommandsCollection);
    }
}
