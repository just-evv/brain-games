<?php

declare(strict_types=1);

namespace Brain\Games\Calc;

use Exception;
use function Brain\Games\Engine\playGame;

const RULES = 'What is the result of the expression?';

/**
 * @param string $operator
 * @param int $num1
 * @param int $num2
 * @return int
 * @throws Exception
 */
function makeCalc(string $operator, int $num1, int $num2): int
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new Exception('Undefined operator');
    }
}

function getCalc(): callable
{
    return function (): array {
        $numRange = [1, 10];
        $num1 = random_int($numRange[0], $numRange[1]);
        $num2 = random_int($numRange[0], $numRange[1]);

        $operators = ['+', '-', '*'];
        $randIndex = array_rand($operators);
        $operator = $operators[$randIndex];

        $rightAnswer = makeCalc($operator, $num1, $num2);
        $question = "{$num1} {$operator} {$num2}";

        return [(string) $rightAnswer, $question];
    };
}

function playCalc(): void
{
    playGame(getCalc(), RULES);
}
