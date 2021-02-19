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
    $i = 1;

    while ($i <= 3) {
        $number = random_int(1, 50);
        $rightAnswer = checkPrime($number);

        line('Answer "yes" if given number is prime. Otherwise answer "no".');
        line("Question: {$number}");
        $answer = prompt('Your answer');

        //Checking
        if ($rightAnswer === $answer) {
            $counter += 1;
            echo("Correct!\n");
        } else {
            echo("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.\nLet's try again, {$name}!\n");
        };

        $i += 1;
    };

    congratulations($counter, $name);
}
