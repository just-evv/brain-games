<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function checkPrime($number)
{
    if ($number === 1) {
        return 'yes';
    } else {
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return 'no';
            }
        }
        return 'yes';
    }
}

function brainPrime()
{
    $name = welcome();

    $counter = 0;
    while ($counter < 3) {
        $number = random_int(1, 50);
        $rightAnswer = checkPrime($number);
        //Question
        line('Answer "yes" if given number is prime. Otherwise answer "no".');
        line("Question: {$number}");
        $answer = prompt('Your answer');
        //Checking
        $counter = checkAnswer($answer, $rightAnswer, $name, $counter);
    }
}
