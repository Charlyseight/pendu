<?php

if(!isset($_COOKIE['gameData'])){
  die('Veuillez activer vos cookies');  
}else{
    extract(decode($_COOKIE['gameData']));
        

    $word = getWord($words, $wordIndex);
    $wordLength = strlen($word);
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

    setcookie('gameData', encode(compact('wordIndex','trials','triedLetters','letters', 'replacementString')));
    
};