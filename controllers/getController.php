<?php
$_SESSION['trials'] = 0;
$_SESSION['letters'] = getLettersArray();
$_SESSION['triedLetters'] = '';
$_SESSION['word'] = getWord();
$_SESSION['wordLength'] = strlen($_SESSION['word']);
$_SESSION['replacementString'] = getReplacementString($_SESSION['wordLength']);
$_SESSION['remainingTrials'] = MAX_TRIALS;
$_SESSION['wordFound'] = false;

