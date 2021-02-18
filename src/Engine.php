<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function welcome()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function congratulations(int $counter, $name)
{
    if ($counter === 3) {
        echo("Congratulations, {$name}!\n");
    };
}