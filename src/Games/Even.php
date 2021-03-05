<?php

declare(strict_types=1);

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function getEven(): callable
{
    return function (): array {
        $evenRange = [1, 100];
        $number = random_int($evenRange[0], $evenRange[1]);
        $result = (($number % 2 === 0) ? 'yes' : 'no');
        $question = "Answer 'yes' if the number is even, otherwise answer 'no'.\nQuestion: {$number}";

        return  [$result, $question];
    };
}

function playEven(): void
{
    playGame(getEven());
}
