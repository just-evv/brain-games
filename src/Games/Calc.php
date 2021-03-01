<?php

declare(strict_types=1);

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function getResult(): array
{
    $min = 1;
    $max = 10;
    $numb1 = random_int($min, $max);
    $numb2 = random_int($min, $max);
    $operators = ['+', '-', '*'];
    $randIndex = array_rand($operators);
    $item = $operators[$randIndex];
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
    $question = "What is the result of the expression?\nQuestion: {$numb1} {$item} {$numb2}";
    $arr = [(string) $rightAnswer, $question];
    return $arr;
}

function playCalc(): void
{
    playGame();
    /*
    $name = welcome();
    $counter = 0;
    while ($counter < 3) {
        $rightAnswer = (string)getCalc($item, $numb1, $numb2);
        //Question
        line('What is the result of the expression?');
        line("Question: {$numb1} {$item} {$numb2}");
        $answer = prompt('Your answer');
        //Checking
        $counter = checkAnswer($answer, $rightAnswer, $name, $counter);
    }
    */
}
