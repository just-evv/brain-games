<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function brainGcd()
{
    $name = welcome();

    $counter = 0;
    $i = 1;

    while ($i <= 3) {
        //Вопрос
        $numb1 = random_int(1, 10);
        $numb2 = random_int(1, 50);
        line('Answer "yes" if the number is even, otherwise answer "no".');
        line("Question: {$numb1} {$numb2}");
        $answer = prompt('Your answer');
        $rightAnswer = gmp_gcd($numb1, $numb2);
        
        //Сравнение
        if ($answer === $rightAnswer) {
            $counter += 1;
            echo("Correct!\n");
        } else  {
            echo("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.\nLet's try again, {$name}!\n");
        };
        $i += 1;
    };

    congratulations($counter, $name);
}
