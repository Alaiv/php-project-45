<?php

namespace BrainGames\BrainGcd;

use function BrainGames\Engine\startGame;

function startGcdGame(): void
{
    $type = 'gcd';
    $message = 'Find the greatest common divisor of given numbers.';
    startGame($message, $type);
}

function getGcdValue(): array
{
    [$num1, $num2] = [rand(1, 100), rand(1, 500)];
    $correctAnswer = checkForGcd($num1, $num2);

    return [(string) $correctAnswer, "{$num1} {$num2}"];
}

function checkForGcd(int $num1, int $num2): int
{
    return ($num1 % $num2 !== 0) ? checkForGcd($num2, $num1 % $num2) : $num2;
}
