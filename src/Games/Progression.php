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
    for ($i = 0; $i <= $length; $i++) {
        $arr[$i] = $count;
        $count = $count + $increment;
    };
    return $arr;
}

function brainProgression()
{
    $name = welcome();

    $counter = 0;
    while ($counter < 3) {
        //Creating a sequence
        $arr = getProgression();
        $randIndex = array_rand($arr);
        $rightAnswer = $arr[$randIndex];
        $arr[$randIndex] = '..';
        $tmp = implode(" ", $arr);
        //Question
        line('What number is missing in the progression?');
        line("Question: {$tmp}");
        $answer = (int)prompt('Your answer');
        //Checking
        $counter = checkAnswer($answer, $rightAnswer, $name, $counter);
    }
}
