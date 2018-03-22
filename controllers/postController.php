<?php


$triedLetter = (ctype_alpha($_POST['triedLetter']) && strlen($_POST['triedLetter']) === 1) ? $_POST['triedLetter'] : '';


if (!$triedLetter) {
    header('Location:/views/errors/wrong-letter.html');
    exit;
};

$_SESSION['triedLetters'] .= $triedLetter;
$_SESSION['letters'][$triedLetter] = false;
                    
    $letterFound = false;
for ($i = 0; $i < $_SESSION['wordLength']; $i++) {
    $l = substr($_SESSION['word'], $i, 1);
        if($triedLetter === $l){
            $letterFound = true;
            $_SESSION['replacementString'] = substr_replace($_SESSION['replacementString'], $l, $i, 1);
        }
    }

    if(!$letterFound){
        $_SESSION['trials']++;
    }else{
        var_dump($_SESSION['word']);
        if ($_SESSION['word'] === $_SESSION['replacementString']) {
            $_SESSION['wordFound'] = true;
        }   
    }

$_SESSION['remainingTrials'] = MAX_TRIALS - $_SESSION['trials'];
