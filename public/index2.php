<?php

session_start();
$liczby = [1, 3, 5, 6, 2, 4, 8, 9, 4, 19];
$parzyste = [];
$nieparzyste = [];
$liczbyBolPiat = [];
$temp = 0;


// sortowanie na parzyste i nie parzyste tablice
for ($i = 0; $i < count($liczby); $i++){
    if($liczby[$i] % 2 == 0){
        $parzyste[] = $liczby[$i];
    }
    else{
        $nieparzyste[] = $liczby[$i];
    }
}


for ($i = 0; $i < count($liczby); $i++){
    for ($j = 0; $j < count($liczby)-1; $j++){
        if($liczby[$j] > $liczby[$j + 1]) {
            $temp = $liczby[$j];
            $liczby[$j] = $liczby[$j + 1];
            $liczby[$j + 1] = $temp;;
        }
    }
}

for ($i = 0; $i < count($liczby); $i++){
    if($liczby[$i] >= 5){
        $liczbyBolPiat[] = $liczby[$i];
    }
}
echo "Posortowane <br>";
echo implode(' ', $liczby) . "<br>";

//print_r($liczby);
echo "Parzyste <br>";
echo implode(' ', $parzyste) . "<br>";

echo "Nieparzyste <br>";
echo implode(' ', $nieparzyste) . "<br>";

echo "wieksze 5 <br>";
echo implode(' ', $liczbyBolPiat) . "<br>";



//zadanie 1
$numbers = [3, 7, 2, 8, 5, 10, 1];


for ($i = 0; $i < count($numbers); $i++){
    if($numbers[$i] >= 5){
        echo $numbers[$i] . ", ";
    }
}

// zadanie 2
$text = "HelloWorldPHP";
$lowerCount = 0;
$upperCount = 0;

for ($i = 0; $i < strlen($text); $i++) {
    if (ctype_lower($text[$i])) {
        $lowerCount++;
    } elseif (ctype_upper($text[$i])) {
        $upperCount++;
    }
}

echo "Małe: $lowerCount, Duże: $upperCount";

// zadanie 3
$students = [
    ["name" => "Anna",  "score" => 85],
    ["name" => "Kamil", "score" => 42],
    ["name" => "Ola",   "score" => 73],
    ["name" => "Marek", "score" => 30]
];

$passed = [];

for ($i = 0; $i < count($students); $i++){
    if($students[$i]['score'] >= 50){
        $passed[] = $students[$i]['name'];
    }
}

echo implode(' ', $passed) . "<br>";


$running = true;
$x = 10;


while ($running){
    $x--;
    if ($x == 0){
        $running = false;
    }
    echo "число " . $x ."<br>";
}
echo "<br>";

$text2 = "HelloPHP!";
$continue = false;

do{
    $continue = true;
    for ($i = 0; $i < strlen($text2); $i++){
        if ($text2[$i] == "P"){
            $continue = false;
        }
        echo $text2[$i] . "<br>";
    }

}while ($continue);


$data = [5, -3, 12, 0, 7, -9, 20, 1];
$i = 0;
$stop = false;
$result = [];

while ($stop == false && $i < count($data)) {
    $current2 = $data[$i];
    $result[] = $current2;
    if ($current2 == 0) {
        $stop = true;
    }

    $i++;

}

echo implode(' ', $result) . "<br>";


$shouldDisabled = false;
?>


<?php
session_start();

// 1. Инициализация tries
if (!isset($_SESSION['tries'])) {
    $_SESSION['tries'] = 0;
}

$correctPassword = "qwerty";
$isCorrect = false;

// 2. POST обработка
if ($_SERVER["REQUEST_METHOD"] === "POST" && !$shouldDisabled) {
    $password = $_POST["password"];

    if ($password === $correctPassword) {
        $isCorrect = true;
    } else {
        $_SESSION["tries"]++;
    }
}

// 3. Теперь tries ЗАНОВО читаем после обработки
$tries = $_SESSION["tries"];

// 4. Логика блокировки
$shouldDisabled = $tries >= 3;

// 5. HTML форма
?>

<form action="" method="post">
    <label for="password">Check password</label> <br>
    <input type="text" name="password" placeholder="Enter your password" <?= $shouldDisabled ? 'disabled' : '' ?> >
    <button type="submit">Send</button>
    <p><?= $tries ?> tries</p>
</form>

