<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function findGcd(int $a, int $b): int
{
    $l = $a > $b ? $a : $b;
    $s = $a > $b ? $b : $a;
    $remainder = $l % $s;
    return 0 === $remainder ? $s : findGcd($s, $remainder);
}

function getGcd(): callable
{
    return function (): array {
        $min = 1;
        $max = 10;
        $numb1 = random_int($min, $max);
        $numb2 = random_int($min, $max);
        $rightAnswer = (string)findGcd($numb1, $numb2);
        $question = "Find the greatest common divisor of given numbers.\nQuestion: {$numb1} {$numb2}";       
        return [$rightAnswer, $question];   
    };
}

function brainGcd(): void
{
    playGame(getGcd());
}
