<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function checkGcd(int $a, int $b): int
{
    $l = $a > $b ? $a : $b;
    $s = $a > $b ? $b : $a;
    $remainder = $l % $s;
    return 0 === $remainder ? $s : gcd($s, $remainder);
}

function getGcd(): array
{
    $min = 1;
    $max = 10;
    $numb1 = random_int($min, $max);
    $numb2 = random_int($min, $max);
    $rightAnswer = (string)checkGcd($numb1, $numb2);
    $question = "Find the greatest common divisor of given numbers.\nQuestion: {$numb1} {$numb2}";
    $arr = [$rightAnswer, $question];
    return $arr;
}

function brainGcd(): void
{
    playGame(__NAMESPACE__ . '\getGcd');
}
