<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function checkPrime(int $number): string
{
    if ($number === 1) {
        return 'yes';
    } else {
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return 'no';
            }
        }
        return 'yes';
    }
}

function getPrime(): array
{
    $min = 1;
    $max = 50;
    $number = random_int($min, $max);
    $rightAnswer = checkPrime($number);
    $question = "Answer 'yes' if given number is prime. Otherwise answer 'no'.\nQuestion: {$number}";
    $arr = [$rightAnswer, $question];
    return $arr;
}

function playPrime(): void
{
    playGame(__NAMESPACE__ . '\getPrime');
}
