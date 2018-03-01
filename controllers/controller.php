<?php 
// Configuration de l'application 

if($words = getWordsArray()){
    if($_SERVER['REQUEST_METHOD']==='POST'){
//    if(isset($_POST['triedLetter']{}
//        if(strlen($_POST['triedLetter'])==1){}
//            if(ctype_alpha($_POST['triedLetter'])){}
    include'postController.php';
    } else if($_SERVER['REQUEST_METHOD']==='GET'){
        include'getController.php';
    }else{
        die("Tu n'as rien à faire ici avec cette méthode HTTP");
    }
} else{
        die("il n'a pas été possible de récupérer les mots deupuis la base de données");
  }



// Définition des données utiles
//$s='';
//for($i=0;$i<$wordLength;$i++){
//    $s.= REPLACEMENT_CHAR;
//}
//$replacementString = $s;