<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function gcd($a, $b)
{
    $large = $a > $b ? $a: $b;
    $small = $a > $b ? $b: $a;
    $remainder = $large % $small;
    return 0 === $remainder ? $small : gcd($small, $remainder);
}

function brainGcd()
{
    $name = welcome();

    $counter = 0;
    $i = 1;

    while ($i <= 3) {
        //Вопрос
        $numb1 = random_int(1, 10);
        $numb2 = random_int(1, 20);
        line('Find the greatest common divisor of given numbers.');
        line("Question: {$numb1} {$numb2}");
        $answer = prompt('Your answer');
        $rightAnswer = gcd($numb1, $numb2);
        

        //Сравнение
        if ((int)$answer === $rightAnswer) {
            $counter += 1;
            echo("Correct!\n");
        } else  {
            echo("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.\nLet's try again, {$name}!\n");
        };
        $i += 1;
    };

    congratulations($counter, $name);
}
