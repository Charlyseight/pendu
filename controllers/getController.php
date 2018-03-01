<?php

$wordIndex = getRandomIndex($words);
$trials = 0;
$letters= getLettersArray();
$triedLetters = '';
$word = getWord($words,$wordIndex);
$wordLength = strlen($word);
$replacementString = getReplacementString($wordLength);
$remainingTrials = MAX_TRIALS;
$wordFound = false;

setcookie('gameData', encode(compact('wordIndex','trials','triedLetters','letters', 'replacementString')));