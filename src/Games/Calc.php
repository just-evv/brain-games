<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function makeCalc(string $item, int $num1, int $num2): int
{
    $rightAnswer = 0;
    switch ($item) {
        case '+':
            $rightAnswer = $num1 + $num2;
            break;
        case '-':
            $rightAnswer = $num1 - $num2;
            break;
        case '*':
            $rightAnswer = $num1 * $num2;
            break;
        default:
            break;
    };
    return $rightAnswer;
}

function getCalc(): callable
{
    return function (): array {
        $numRange = [1, 10];
        $num1 = random_int($numRange[0], $numRange[1]);
        $num2 = random_int($numRange[0], $numRange[1]);

        $operators = ['+', '-', '*'];
        $randIndex = array_rand($operators);
        $item = $operators[$randIndex];

        $rightAnswer = makeCalc($item, $num1, $num2);
        $question = "What is the result of the expression?\nQuestion: {$num1} {$item} {$num2}";

        return [(string) $rightAnswer, $question];
    };
}

function playCalc(): void
{
    playGame(getCalc());
}
