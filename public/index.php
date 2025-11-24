<?php
session_start();

$letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

$numbers = "0123456789";

$special = "!@#$%^&*()-_=+[]{};:,.<>/?|/";

$all = [];

$password = [];

$passwordStrenght = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lenght = (int)$_POST["lenght"];
    $includeNumbers = isset($_POST["numbers"]);
    $includeSpecial = isset($_POST["special"]);

    for ($i = 0; $i < $lenght; $i++) {
        $randomLetter = rand(0, strlen($letters) - 1);
        $all[] = $letters[$randomLetter];
    }

    if ($includeNumbers) {
        for ($i = 0; $i < $lenght; $i++) {
            $randomNumber = rand(0, strlen($numbers) - 1);
            $all[] = $numbers[$randomNumber];
        }
    }

    if ($includeSpecial) {
        for ($i = 0; $i < $lenght; $i++) {
            $randomSpecial = rand(0, strlen($special) - 1);
            $all[] = $special[$randomSpecial];
        }
    }

    for ($i = 0; $i < $lenght; $i++) {
        $randomAll = rand(0, count($all) - 1);
        $password[] = $all[$randomAll];
    }

    $lettersCount = 0;
    $numbersCount = 0;
    $specialCount = 0;
    $generatedPassword = implode("", $password);


    for ($i = 0; $i < strlen($generatedPassword); $i++) {
        $char = $generatedPassword[$i];
        if ($char >= "0" && $char <= "9") {
            $numbersCount++;
        } elseif ($char >= "a" && $char <= "z" || $char >= "A" && $char <= "Z") {
            $lettersCount++;
        } else {
            $specialCount++;
        }
    }

    if (count($password) >= 1 && count($password) <= 5) {
        $passwordStrenght = 1;

        if ($numbersCount > 0 || $specialCount > 0) {
            $passwordStrenght = 2;
        }

        if ($numbersCount && $specialCount > 0) {
            if ($numbersCount + $specialCount > $lettersCount) {
                $passwordStrenght = 3;
            }
        }
    } elseif (count($password) > 5 && count($password) <= 10) {
        $passwordStrenght = 4;

        if ($numbersCount > 0 || $specialCount > 0) {
            $passwordStrenght = 5;
        }

        if ($numbersCount && $specialCount > 0) {
            if ($numbersCount + $specialCount > $lettersCount) {
                $passwordStrenght = 6;
            }
        }
    } elseif (count($password) > 10 && count($password) <= 15) {
        $passwordStrenght = 7;

        if ($numbersCount > 0 || $specialCount > 0) {
            $passwordStrenght = 8;
        }
        if ($numbersCount && $specialCount > 0) {
            if ($numbersCount + $specialCount > $lettersCount) {
                $passwordStrenght = 9;
            }
        }

    } elseif (count($password) > 15) {

        if ($numbersCount > 0 || $specialCount > 0) {
            $passwordStrenght = 9;
        }

        if ($numbersCount + $specialCount > 10) {
            $passwordStrenght = 10;
        }
    }


}
?>
<form action="" method="post">
    <label for="password"> Generate password</label>
    <input type="text" name="password" value="<?= $generatedPassword; ?>">
    <br>
    <label for="lenght">Password lenght</label>
    <input type="number" name="lenght">
    <br>
    <label for="numbers"> Numbers</label>
    <input type="checkbox" name="numbers">
    <br>
    <label for="special"> special signs</label>
    <input type="checkbox" name="special">
    <br>
    <button type="submit">Generate</button>
</form>
<p>
    Password strenght: <span><?= $passwordStrenght ?></span>
</p>
