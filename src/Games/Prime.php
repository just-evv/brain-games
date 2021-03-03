<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function checkPrime(int $number): string
{
    if ($number === 1) {
        return 'no';
    } else {
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return 'no';
            }
        }
        return 'yes';
    }
}

function getPrime(): callable
{
    return function (): array {
        $primeMin = 1;
        $primeMax = 50;
        $number = random_int($primeMin, $primeMax);

        $rightAnswer = checkPrime($number);
        $question = "Answer 'yes' if given number is prime. Otherwise answer 'no'.\nQuestion: {$number}";

        return [$rightAnswer, $question];
    };
}

function playPrime(): void
{
    playGame(getPrime());
}
