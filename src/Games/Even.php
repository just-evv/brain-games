<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function checkEven($number)
{
    return ($number % 2 === 0) ? 'yes' : 'no';
}

function brainEven()
{
    $name = welcome();

    $counter = 0;
    
    while ($counter < 3) {
        $number = random_int(1, 100);
        $rightAnswer = checkEven($number);
        //Question
        line('Answer "yes" if the number is even, otherwise answer "no".');
        line("Question: {$number}");
        $answer = prompt('Your answer');
        //Checking
        $counter = checkAnswer($answer, $rightAnswer, $name, $counter);
    }
}
