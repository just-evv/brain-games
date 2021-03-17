<?php

declare(strict_types=1);

namespace Brain\Games\Calc;

use function Brain\Games\Engine\playGame;

const RULES = 'What is the result of the expression?';

function makeCalc(string $item, int $num1, int $num2): int
{
    switch ($item) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception('Undefined operator');
    };
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
        $question = "{$num1} {$item} {$num2}";

        return [(string) $rightAnswer, $question];
    };
}

function playCalc(): void
{
    playGame(getCalc(), RULES);
}
