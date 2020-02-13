<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";
//Функция вывода ошибки ввода
function fail($str, $id = true)
{
    echo '<title>Ошибка ввода</title>
<link rel="stylesheet" href="main.css">
<div class="section" data-vide-bg="video/ocean">
<div class="fon">';
    if ($id) {
        echo "<p>Пожалуйста, укажите $str.</p>";
    } else {
        echo "<p>$str.</p>";
    }
    echo "<p><a class='but' href='../edit_book.php'>Заполнить заново</a></p>";
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
    if (!empty(trim($_POST['name']))) {
        $name = trim(addslashes($_POST['name']));
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
    $IDarr = explode('|',$_POST['idB']);
    $idB = $IDarr[0];
    $count = $IDarr[1];
    $name_a = array();
    for ($i = 0;$i<$count;++$i){
        if (!empty(trim($_POST['name_a'.$i.'']))) {
            $name_a[$i] = trim(addslashes($_POST['name_a'.$i.'']));
        } else {
            fail('Укажите автора', false);
        }
    }
    var_dump($_POST['idB']);
    //Подключение БД
    require('../connectBD.php');
    $IDarr = explode('|',$_POST['book']);
    $idA = $IDarr[0];
    $idB = $IDarr[1];
    //Запись в переменную SQL запроса
    $sql = "UPDATE books SET title = '$name', price = '$price' WHERE id = '$idB'";
    //Отправка запроса БД
    $pdo->query($sql);
    //Отправка запроса БД и запись результата в переменную
    $sql = $pdo->query("SELECT id_author as idA FROM books_authors WHERE id_books = '$idB'");
    //Преобразование результата запроса в массив
    $sql = $sql->fetchAll();
    //Запись в одномерный массив последней строки двумерного
    for($i = 0;$i<count($sql);++$i){
        $idA = $sql[$i]['idA'];
        $pdo->query("UPDATE authors SET 'name' = '$name_a[$i]' WHERE id = '$idA'");
    }

    echo "<pre>";
    var_dump([$name,$price,$sql,$idB,$name_a,$IDarr]);
    echo "</pre>";
}
//Перессылка на главную
header('Location: ../index.php');