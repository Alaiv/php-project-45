<?php

namespace BrainGames\BrainProgression;

use function BrainGames\Engine\startGame;

function startProgressionGame(): void
{
    $type = 'progression';
    $message = 'What number is missing in the progression?';
    startGame($message, $type);
}

function getProgression(): array
{
    $start = rand(1, 50);
    [$range, $steps] = [rand(5, 10), rand(1, 3)];
    $finish =  $start + ($range * $steps);
    $progression = [];

    for ($i = $start; $i <= $finish; $i += $steps) {
        $progression[] = $i;
    }

    $answerIndex = rand(0, count($progression) - 1);
    $correctAnswer = $progression[$answerIndex];
    $progression[$answerIndex] = '..';
    $question = implode(' ', $progression);

    return [(string)$correctAnswer, $question];
}
