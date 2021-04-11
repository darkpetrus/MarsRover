<?php

namespace MarsRover\Model\Command;

class ObjectDetector 
{
    public function detectObject($newInputSetup): bool
    {
        //todo DLL implement
        $detection = (bool)random_int(0, 1);
        return $detection;
    }
}