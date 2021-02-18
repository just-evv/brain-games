<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function brainEven()
{
    $name = welcome();

    $counter = 0;
    $i = 1;

    while ($i <= 3) {
        //Вопрос
        $number = random_int(1, 100);
        line('Answer "yes" if the number is even, otherwise answer "no".');
        line("Question: {$number}");
        $answer = prompt('Your answer');

        //Сравнение
        if (($answer === 'yes') && ($number % 2 === 0)) {
            $counter += 1;
            echo("Correct!\n");
        } elseif (($answer === 'no') && ($number % 2 === 0)) {
            echo("'no' is wrong answer ;(. Correct answer was 'yes'.\nLet's try again, {$name}!\n");
        } else {
            if ($answer === 'no') {
                $counter += 1;
                echo("Correct!\n");
            } else {
                echo("'no' is wrong answer ;(. Correct answer was 'yes'.\nLet's try again, {$name}!\n");
            }
        };
        $i += 1;
    };

    congratulations($counter, $name);
}
