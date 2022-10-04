<?php

namespace BrainGames\Engine;

use function BrainGames\BrainEven\getEvenNumber;
use function BrainGames\BrainGcd\getGcdValue;
use function BrainGames\BrainCalc\calculate;
use function BrainGames\BrainPrime\getNumber;
use function BrainGames\BrainProgression\getProgression;
use function BrainGames\Greeting\getUserName;
use function cli\line;
use function cli\prompt;

function startGame(string $message, string $type): void
{
    $name = getUserName($message);

    $winCondition = 3;
    $correctAnswers = 0;
    $gameFinished = false;
    $userCorrect = true;

    while ($userCorrect && !$gameFinished) {
        if ($correctAnswers === $winCondition) {
            line("Congratulations, $name!");
            $gameFinished = true;
        } else {
            [$correctAnswer, $number] = chooseGame($type);
            line("Question: $number");
            $answer = prompt("Your answer");
            $userCorrect = $answer === $correctAnswer;
            $correctAnswers += getAnswersResult($answer, $name, $correctAnswer)
                ? 1 : 0;
        }
    }
}

function chooseGame(string $type): array
{
    return match ($type) {
        'even' => getEvenNumber(),
        'calc' => calculate(),
        'gcd' => getGcdValue(),
        'progression' => getProgression(),
        'prime' => getNumber(),
        default => ['Wrong', 'Type'],
    };
}

function getAnswersResult(string $answer, string $name, string $correctAnswer): bool
{
    if ($answer !== $correctAnswer) {
        line("'{$answer}' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        line("Let's try again, $name!");
        return false;
    }
    line('Correct!');
    return true;
}
