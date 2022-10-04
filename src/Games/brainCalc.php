<?php

namespace BrainGames\BrainCalc;

use function BrainGames\Engine\startGame;

function startCalcGame(): void
{
    $type = 'calc';
    $message = 'What is the result of the expression?';
    startGame($message, $type);
}

function calculate(): array
{
    [$n1, $n2] = [rand(2, 30), rand(4, 15)];
    $calcTypes = ['*', '-', '+'];
    $calcType = $calcTypes[rand(0, 2)];

    return match ($calcType) {
        '*' => [(string)($n1 * $n2), "{$n1} * {$n2}"],
        '+' => [(string)($n1 + $n2), "{$n1} + {$n2}"],
        '-' => [(string)($n1 - $n2), "{$n1} - {$n2}"],
        default => [null, null],
    };
}
