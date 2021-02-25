<?php
declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function checkAnswer(string $answer, string $rightAnswer, string $name, int $counter): int
{
    if ($rightAnswer === $answer) {
        $counter += 1;
        echo("Correct!\n");
        if ($counter === 3) {
            echo("Congratulations, {$name}!\n");
        }
    } else {
        echo("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.\nLet's try again, {$name}!\n");
        $counter = 3;
    };
    return $counter;
}
