<?php

namespace BrainGames\BrainPrime;

use function BrainGames\Engine\startGame;

function startPrimeGame(): void
{
    $type = 'prime';
    $message = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    startGame($message, $type);
}

function getNumber(): array
{
    $number = rand(1, 150);
    $correctAnswer = checkForPrime($number) ? 'yes' : 'no';
    return [$correctAnswer, $number];
}

function checkForPrime(int $num): bool
{
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
