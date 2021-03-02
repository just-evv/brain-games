<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function makeCalc(string $item, int $numb1, int $numb2): int
{
    $rightAnswer = 0;
    switch ($item) {
        case '+':
            $rightAnswer = $numb1 + $numb2;
            break;
        case '-':
            $rightAnswer = $numb1 - $numb2;
            break;
        case '*':
            $rightAnswer = $numb1 * $numb2;
            break;
        default:
            break;
    };
    return $rightAnswer;
}

function getCalc(): callable
{
    return function (): array {
        $min = 1;
        $max = 10;
        $numb1 = random_int($min, $max);
        $numb2 = random_int($min, $max);
        $operators = ['+', '-', '*'];
        $randIndex = array_rand($operators);
        $item = $operators[$randIndex];
        //calculating correct answer
        $rightAnswer = makeCalc($item, $numb1, $numb2);
        //creating question
        $question = "What is the result of the expression?\nQuestion: {$numb1} {$item} {$numb2}";
        return [(string) $rightAnswer, $question];
    };    
}

function playCalc(): void
{
    playGame(getCalc());
}
