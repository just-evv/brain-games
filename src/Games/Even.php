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
    $i = 1;

    while ($i <= 3) {
        $number = random_int(1, 100);
        $rightAnswer = checkEven($number);
        //Вопрос
        line('Answer "yes" if the number is even, otherwise answer "no".');
        line("Question: {$number}");
        $answer = prompt('Your answer');
        //Сравнение
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
