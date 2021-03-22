<?php

declare(strict_types=1);

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const TOTAL_ROUNDS_COUNT = 3;

function playGame(callable $game, string $rules): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rules);

    $currentRound = 0;

    while ($currentRound < TOTAL_ROUNDS_COUNT) {
        [$rightAnswer, $question] = $game();

        line("Question: $question");
        $answer = prompt('Your answer');

        if ($rightAnswer !== $answer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }

        $currentRound += 1;
        line('Correct!');
    }

    line("Congratulations, {$name}!");
}
