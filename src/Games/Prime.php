<?php

declare(strict_types=1);

namespace Brain\Games\Prime;

use function Brain\Games\Engine\playGame;

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
        $primeRange = [1, 50];
        $number = random_int($primeRange[0], $primeRange[1]);

        $rightAnswer = checkPrime($number);
        $question = "Answer 'yes' if given number is prime. Otherwise answer 'no'.\nQuestion: {$number}";

        return [$rightAnswer, $question];
    };
}

function playPrime(): void
{
    playGame(getPrime());
}
