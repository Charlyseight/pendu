<?php

function getLettersArray()
{
    return [
            "a" => true,
            "b" => true,
            "c" => true,
            "d" => true,
            "e" => true,
            "f" => true,
            "g" => true,
            "h" => true,
            "i" => true,
            "j" => true,
            "k" => true,
            "l" => true,
            "m" => true,
            "n" => true,
            "o" => true,
            "p" => true,
            "q" => true,
            "r" => true,
            "s" => true,
            "t" => true,
            "u" => true,
            "v" => true,
            "w" => true,
            "x" => true,
            "y" => true,
            "z" => true];
}

//function getUnserializedLetters($serializedLetters){
//    return unserialize(urldecode($serializedLetters));
//}
//
//function getSerializedLetters($lettersArray){
//    return urlencode(serialize($lettersArray));
//}

function getWordsArray()
{
    $wordsArray = @file(SOURCE_PATH, FILE_IGNORE_NEW_LINES) ?: false;
    if ($wordsArray) {
        return $wordsArray;
    } else {
        header('Location:/views/errors/missing-word.html');
        exit;
    }
}

function getWord()
{
    // $wordsArray = getWordsArray();
    // return strtolower($wordsArray[rand(0,count($wordsArray)-1)]);
    $cx = getConnectionToDb();
    $sql = 'SELECT word FROM pendu.words ORDER BY RAND() LIMIT 1';
    try {
        $pst = $cx->query($sql);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    $word = $pst->fetchColumn();
    return strtolower($word);
}

function getReplacementString($wordLength)
{
    return str_pad('',$wordLength,REPLACEMENT_CHAR);
}

function encode($toEncode){
    return base64_encode(json_encode($toEncode));
}

function decode($toDecode){
    return json_decode(base64_decode($toDecode),true);
}

function getConnectionToDb()
{
    $dbConfig = parse_ini_file(INI_FILE);
    $dsn = 'mysql:host=%s;dbname=%s';
    $dsn = sprintf($dsn, $dbConfig['DB_HOST'], $dbConfig['DB_NAME']);
    $user = $dbConfig['DB_USER'];
    $pass = $dbConfig['DB_PASS'];
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    try {
        $cx = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        die($e->getMessage());
    };
    return $cx;
}

;