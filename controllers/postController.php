<?php

$wordIndex = intval($_POST['wordIndex']);
$trials = $_POST['trials'];
$letters = getUnserializedLetters($_POST['serializedLetters']);
$triedLetters = $_POST["triedLetters"];
$word = getWord($words, $wordIndex);
$wordLength = strlen($word);
$replacementString = $_POST['replacementString'];
$triedLetter = $_POST['triedLetter'];
$wordFound = false;


$triedLetters .= $triedLetter;
$letters[$triedLetter] = false;
$letterFound = false;
for($i=0;$i<$wordLength;$i++){
    $l=substr($word,$i,1);
    if($triedLetter === $l){
        $letterFound = true;
        $replacementString = substr_replace($replacementString,$l,$i,1);
    }
}

if(!$letterFound){
    $trials++;
}else{
    if($word === $replacementString){
    $wordFound = true;
    }   
}


$remainingTrials= MAX_TRIALS-$trials;
$serializedLetters=getSerializedLetters($letters);