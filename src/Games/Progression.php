<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function getProgression()
{
    $count = random_int(1, 20);
    $increment = random_int(1, 10);
    $arr = [];
    $length = random_int(10, 20);
    for ($i = 0; $i <= $lengh; $i++) {
        $arr[$i] = $count;
        $count = $count + $increment;
    };
    return $arr;
}

function progression()
{
    $name = welcome();

    $counter = 0;
    $i = 1;

    while ($i <= 3) {
        //Creating a sequence
        $arr = getProgression();
        $randIndex = array_rand($arr);
        $rightAnswer = $arr[$randIndex];
        $arr[$randIndex] = '..';
        $tmp = implode(",", $arr);
        //Question
        line('What number is missing in the progression?');
        line("Question: {$tmp}");
        $answer = prompt('Your answer');
        //Checking
        if ($rightAnswer === (int)$answer) {
            $counter += 1;
            echo("Correct!\n");
        } else {
            echo("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.\nLet's try again, {$name}!\n");
        };

        $i += 1;
    };

    congratulations($counter, $name);
}
