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

function checkAnswer($answer, $rightAnswer, $name, $counter)
{
    
    if ($rightAnswer === $answer) {
        $counter += 1;
        echo("Correct!\n");
    } else {
        echo("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.\nLet's try again, {$name}!\n");
    };
    return $counter;
}
