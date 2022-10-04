<?php

namespace BrainGames\Greeting;

use function cli\line;
use function cli\prompt;

function getUserName(string $message): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line($message);
    return $name;
}
