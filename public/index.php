<?php
session_start();

$letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

$numbers = "0123456789";

$special = "!@#$%^&*()-_=+[]{};:,.<>/?|/";

$all = [];

$password = [];

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

    $generatedPassword = implode("", $password);

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
