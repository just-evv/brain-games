<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function brainCalc()
{
    $name = welcome();

    $counter = 0;
    $operators = ['+', '-', '*'];

    foreach ($operators as $item) {
        $numb1 = random_int(1, 10);
        $numb2 = random_int(1, 10);
        $rightAnswer = 0;
//Calculating correct answer
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
//Question
        line('What is the result of the expression?');
        line("Question: {$numb1} {$item} {$numb2}");
        $answer = prompt('Your answer');
//Checking
        if ($rightAnswer === (int)$answer) {
            echo("Correct!\n");
            $counter += 1;
        } else {
            echo("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.\nLet's try again, {$name}!\n");
        }
    };

    congratulations($counter, $name);
}
