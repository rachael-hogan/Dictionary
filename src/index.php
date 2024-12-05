<?php
namespace Rachaelhogan\Dictionary;

require __DIR__ . '/../vendor/autoload.php';

$dictionary = new Dictionary();
$guessNumber = 0;
while ($guessNumber <5) {
    echo("Please enter your guess:\n");
    // Get input from the user
    $input = trim(fgets(STDIN));
    $valid = $dictionary->checkValidity($input);
    if (!$valid) {
        echo("Invalid input. Please enter a valid word from the dictionary.\n");
        continue;
    }
    $response = $dictionary->checkGuess($input);
    if ($response[0]){
        echo("Your hint is: " . $response[1] . "\n");
    } else {
        echo($response[1]);
        break;
    }
    $guessNumber ++;
}

echo("You have reached the maximum number of guesses. The word was: " . $dictionary->keyWord);
