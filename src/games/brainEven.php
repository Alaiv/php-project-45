<?php

namespace BrainGames\BrainEven;

use function BrainGames\Greeting\getUserName;
use function cli\line;
use function cli\prompt;

function startEvenGame(): void
{
    $winCondition = 3;
    $correctAnswers = 0;
    $gameFinished = false;
    $userCorrect = true;
    $name = getUserName('Answer "yes" if the number is even, otherwise answer "no".');

    while ($userCorrect && !$gameFinished) {
        if ($correctAnswers === $winCondition) {
            line("Congratulations, {$name}!");
            $gameFinished = true;
        } else {
            $correctAnswer = getEvenNumber();
            $answer = prompt("Your answer: ");
            $userCorrect = $answer === $correctAnswer;

            if ($userCorrect === false) {
                line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}.");
                line("Let's try again, {$name}!");
            } else {
                line('Correct!');
                $correctAnswers++;
            }
        }
    }
}


function getEvenNumber(): string
{
    $number = rand(5, 100);
    $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
    line("Question: {$number}");

    return $correctAnswer;
}
