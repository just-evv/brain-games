<?php
declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function getCalc(string $item, int $numb1, int $numb2): int
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

function brainCalc(): void
{
    $name = welcome();

    $operators = ['+', '-', '*'];
    $counter = 0;
    while ($counter < 3) {
        $numb1 = random_int(1, 10);
        $numb2 = random_int(1, 10);
        $randIndex = array_rand($operators);
        $item = $operators[$randIndex];
        $rightAnswer = (string)getCalc($item, $numb1, $numb2);
        //Question
        line('What is the result of the expression?');
        line("Question: {$numb1} {$item} {$numb2}");
        $answer = prompt('Your answer');
        //Checking
        $counter = checkAnswer($answer, $rightAnswer, $name, $counter);
    }
}
