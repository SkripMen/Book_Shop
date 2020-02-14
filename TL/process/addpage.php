<?php
//подключение к бд
include ('../connectBD.php');
//Функция вывода ошибки ввода
function error($str, $id = true)
{
    echo '<title>Ошибка ввода</title>
<link rel="stylesheet" href="../main.css">
<div class="section" data-vide-bg="../video/ocean">
<div class="fon">';
    if ($id) {
        echo "<p>Пожалуйста, укажите $str.</p>";
    } else {
        echo "<p>$str.</p>";
    }
    echo "<p><a class='but' href='../index.php'>Заполнить заново</a></p>";
    echo '
</div>
</div>
        <!--подключение jquery-->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!--подключение vide.js-->
<script src="../js/jquery.vide.min.js"></script>
    ';
    exit();
}
//проверки
if (!empty(trim($_POST['name']))) {
    $name = trim(addslashes($_POST['name']));
} else {
    error('название книги');
}

if(is_numeric(trim($_POST['price'])))
{
    if (!empty(trim($_POST['price']))) {
        $price = trim(addslashes($_POST['price']));
    } else {
        error('цену книги');
    }
} else {
    error('Неверный формат поля: "цена"', false);
}

if (!empty(trim($_POST['name_a']))) {
    $name_a = trim(addslashes($_POST['name_a']));
    $name_a = explode(',',$name_a);
} else {
    error('Укажите автора', false);
}$sql = "INSERT INTO books (title,price) VALUES ('$name','$price')";
//var_dump($name_a);
$pdo->query($sql);
for ($i=0;$i<count($name_a);++$i){
//добавление названия и цены книги в БД

//var_dump($sql);

//добавление имя автора книги в БД
$sql = "INSERT INTO authors (name) VALUES ('{$name_a[$i]}')";
$pdo->query($sql);

$sql = $pdo->query("SELECT id FROM authors");
$sql = $sql->fetchAll();
$sql = $sql[count($sql)-1];
$idA = $sql['id'];


$sql = $pdo->query("SELECT id FROM books");
$sql = $sql->fetchAll();
$sql = $sql[count($sql)-1];
$idB = $sql['id'];

//добавление названия,цены и автора книги в БД в связующию таблицу
$sql="INSERT INTO books_authors (id_author, id_books) VALUES ('$idA','$idB')";
$pdo->query($sql);}
//переход на главную страницу
header('Location:../index.php');