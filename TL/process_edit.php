<?php
//Функция вывода ошибки ввода
function fail($str, $id = true)
{
    echo '<title>Ошибка ввода</title>
<link rel="stylesheet" href="main.css">
<div class="section" data-vide-bg="../video/ocean">
<div class="fon">';
    if ($id) {
        echo "<p>Пожалуйста, укажите $str.</p>";
    } else {
        echo "<p>$str.</p>";
    }
    echo "<p><a class='but' href='edit_book.php'>Заполнить заново</a></p>";
    echo '
</div>
</div>
        <!--подключение jquery-->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!--подключение vide.js-->
<script src="js/jquery.vide.min.js"></script>
    ';
    exit();
}

//Проверка на заполненость метода POST
if (isset($_POST)) {

    //Проверки
    if (!empty(trim($_POST['title']))) {
        $title = trim(addslashes($_POST['title']));
    } else {
        fail('название книги');
    }

    if (is_numeric(trim($_POST['price']))) {
        if (!empty(trim($_POST['price']))) {
            $price = trim(addslashes($_POST['price']));
        } else {
            fail('цену книги');
        }
    } else {
        fail('Неверный формат поля: "цена"', false);
    }
    $IDarr = explode('|',$_POST['id']);
    $idA = $IDarr[0];
    $idB = $IDarr[1];
    $count = $IDarr[2];

        if (!empty(trim($_POST['name']))) {
            $name = trim(addslashes($_POST['name']));
        } else {
            fail('Имя автора', false);
        }
    //Подключение БД
    require('connectBD.php');
    $IDarr = explode('|',$_POST['id']);
    $idA = $IDarr[0];
    $idB = $IDarr[1];
    //Запись в переменную SQL запроса
    $sql = "UPDATE `books` SET `title` = '{$title}', `price` = '{$price}' WHERE id = '{$idB}'";
    //Отправка запроса БД
    $pdo->query($sql);
    //Отправка запроса БД и запись результата в переменную
    $sql = $pdo->query("SELECT `id_author` as `idA` FROM `books_authors` WHERE `id_books` = '{$idB}'");
    //Преобразование результата запроса в массив
    $sql = $sql->fetchAll();
    //Запись в одномерный массив последней строки двумерного
    for($i = 0;$i<count($sql);++$i){
        $idA = $sql[$i]['idA'];
        $pdo->query("UPDATE `authors` SET `name` = '{$name}' WHERE `id` = '{$idA}'");
    }
}
//Перессылка на главную
echo'<script src="js/exit.js"></script>';
//header('Location: index.php');