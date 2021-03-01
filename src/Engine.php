<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function getName(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function getAnswer(string $question): string
{
    line($question);
    $answer = prompt('Your answer');
    return $answer;
}

function checkAnswer(
    string $answer,
    string $rightAnswer,
    string $name,
    int $count,
    int $lastGame
): int {
    if ($rightAnswer === $answer) {
        $count += 1;
        echo("Correct!\n");
        if ($count === $lastGame) {
            echo("Congratulations, {$name}!\n");
        }
    } else {
        echo("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.\nLet's try again, {$name}!\n");
        $count = $lastGame;
    };
    return $count;
}

function playGame(callable $game): void
{
    $name = getName();

    $count = 0;
    $lastGame = 3;

    while ($count < $lastGame) {
        //getResult return array with firts item - expected answer and the  second Qestion to be asked.
        $arr = $game();
        $rightAnswer = $arr[0];
        $question = $arr[1];
        //Question
        $answer = getAnswer($question);
        //Checking
        $count = checkAnswer($answer, $rightAnswer, $name, $count, $lastGame);
    }
}
