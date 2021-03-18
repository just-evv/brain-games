<?php

declare(strict_types=1);

namespace Brain\Games\Progression;

use function Brain\Games\Engine\playGame;

const RULES = 'What number is missing in the progression?';

function getSequence(): array
{
    $sequenceRange = [1, 50];
    $sequenceElement = random_int($sequenceRange[0], $sequenceRange[1]);

    $incrementRange = [1, 10];
    $increment = random_int($incrementRange[0], $incrementRange[1]);

    $lenghtRange = [10, 20];
    $length = random_int($lenghtRange[0], $lenghtRange[1]);

    $sequence = [];

    for ($i = 0; $i <= $length; $i++) {
        $sequence[$i] = $sequenceElement;
        $sequenceElement += $increment;
    };
    return $sequence;
}

function getProgressionGame(): callable
{
    return function (): array {
        $progression = getSequence();
        $randIndex = array_rand($progression);
        $rightAnswer = $progression[$randIndex];
        $progression[$randIndex] = '..';
        $question = implode(' ', $progression);

        return [(string) $rightAnswer, $question];
    };
}

function playProgression(): void
{
    playGame(getProgressionGame(), RULES);
}
