<?php

declare(strict_types=1);

namespace Brain\Games\Prime;

use function Brain\Games\Engine\playGame;

const RULES = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function isPrime(int $number): bool
{
    if ($number === 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function getPrime(): callable
{
    return function (): array {
        $question = random_int(1, 50);
        $rightAnswer = isPrime($question) ? 'yes' : 'no';

        return [$rightAnswer, (string) $question];
    };
}

function playPrime(): void
{
    playGame(getPrime(), RULES);
}
