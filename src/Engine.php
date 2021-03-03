<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

const TOTAL_ROUNDS_COUNT = 3;

function askName(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function askAnswer(string $question): string
{
    line($question);
    $answer = prompt('Your answer');
    return $answer;
}

function playGame(callable $game): void
{
    $name = askName();

    $currentRound = 0;

    while ($currentRound < TOTAL_ROUNDS_COUNT) {
        [$rightAnswer, $question] = $game();

        $answer = askAnswer($question);

        if ($rightAnswer !== $answer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            line("Let's try again, {$name}!\n");
            return;
        }
        $currentRound += 1;
        line('Correct!');

        if ($currentRound === TOTAL_ROUNDS_COUNT) {
            line("Congratulations, {$name}!");
        }
    }
}
