<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function getEven(): callable
{
    return function (): array {
        $min = 1;
        $max = 100;
        $number = random_int($min, $max);
        $result = (($number % 2 === 0) ? 'yes' : 'no');
        $question = "Answer 'yes' if the number is even, otherwise answer 'no'.\nQuestion: {$number}";
        return  [$result, $question];
    };    
}

function playEven(): void
{
    playGame(getEven());
}
