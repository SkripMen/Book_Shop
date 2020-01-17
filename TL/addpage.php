<?php

//подключение к бд
include ('connectBD.php');

//получение данных методом POST из формы
if (isset($_POST)) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $name_a = $_POST['name_a'];
    $surname = $_POST['surname'];

}
else{
    echo "Страница не добавилась!";
}

$data = $pdo->query("INSERT INTO `books` (`id`, `title`, `price`) VALUES (NULL, '$name', '$price')");
$data = $pdo->query("INSERT INTO `authors` (`id`, `name`) VALUES (NULL, '$name_a')");

//
//echo <<<HTML
//<!DOCTYPE html>
//<html lang="en">
//<head>
//    <meta charset="UTF-8">
//    <title>Directory</title>
//    <link rel="stylesheet" href="main.css">
//</head>
//<body>
//
//<br>
//<br>
//<br>
//
//<div class="Lucas"><a href="index.php"> Вернуться на главную страницу</a>
//
//</div>
//</body>
//</html>
//HTML;