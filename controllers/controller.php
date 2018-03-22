<?php
// Configuration de l'application
$wordFound = false;
session_start();
if($words = getWordsArray()){
    if($_SERVER['REQUEST_METHOD']==='POST'){
//    if(isset($_POST['triedLetter']{}
//        if(strlen($_POST['triedLetter'])==1){}
//            if(ctype_alpha($_POST['triedLetter'])){}
    include'postController.php';
    } else if($_SERVER['REQUEST_METHOD']==='GET'){
        include'getController.php';
    }else{
        header('Location:/views/errors/wrong-method.html');
        exit;
    }
}





// Définition des données utiles
//$s='';
//for($i=0;$i<$wordLength;$i++){
//    $s.= REPLACEMENT_CHAR;
//}
//$replacementString = $s;