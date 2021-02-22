<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function gcd($a, $b)
{
    $l = $a > $b ? $a : $b;
    $s = $a > $b ? $b : $a;
    $remainder = $l % $s;
    return 0 === $remainder ? $s : gcd($s, $remainder);
}

function brainGcd()
{
    $name = welcome();

    $counter = 0;
    while ($counter < 3) {
        $numb1 = random_int(1, 10);
        $numb2 = random_int(1, 20);
        $rightAnswer = gcd($numb1, $numb2);
        //Question
        line('Find the greatest common divisor of given numbers.');
        line("Question: {$numb1} {$numb2}");
        $answer = (int)prompt('Your answer');
        //Checking
        $counter = checkAnswer($answer, $rightAnswer, $name, $counter);
    }
}
