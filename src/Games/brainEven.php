<?php

namespace BrainGames\BrainEven;

use function BrainGames\Engine\startGame;

function startEvenGame(): void
{
    $type = 'even';
    $message = 'Answer "yes" if the number is even, otherwise answer "no".';
    startGame($message, $type);
}


function getEvenNumber(): array
{
    $number = rand(5, 100);
    $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

    return [$correctAnswer, $number];
}
