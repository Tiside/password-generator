<?php

$correctPassword = "qwerty";
$isCorrect = true;
$tries = 0;
do{
    $password = readline("Enter Password: ");

    if($password == $correctPassword){
        $isCorrect = true;
        echo "Password is correct.";
        break;
    }
    if ($password != $correctPassword) {
        $tries++;
    }

    if ($tries == 3) {
        echo "Try again later";
        break;
    }

}while ($tries < 3);