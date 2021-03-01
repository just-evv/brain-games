<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function getSequence(): array
{
    $min = 1;
    $medium = 10;
    $max = 20;
    $count = random_int($min, $max);
    $increment = random_int($min, $medium);
    $length = random_int($medium, $max);
    $arr = [];
    for ($i = 0; $i <= $length; $i++) {
        $arr[$i] = $count;
        $count = $count + $increment;
    };
    return $arr;
}

function getProgression(): array
{
    $arr = getSequence();
    $randIndex = array_rand($arr);
    $rightAnswer = $arr[$randIndex];
    $arr[$randIndex] = '..';
    $tmp = implode(" ", $arr);
    $question = "What number is missing in the progression?\nQuestion: {$tmp}";
    $result = [(string) $rightAnswer, $question];
    return $result;
}

function playProgression(): void
{
    playGame(__NAMESPACE__ . '\getProgression');
}
