<?php

declare(strict_types=1);

namespace Brain\Games\Even;

use function Brain\Games\Engine\playGame;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function getEven(): callable
{
    return function (): array {
        $question = random_int(1, 100);
        $result = ($question % 2) === 0 ? 'yes' : 'no';

        return  [$result, $question];
    };
}

function playEven(): void
{
    playGame(getEven(), RULES);
}
