<?php
//подключение к бд
include ('connectBD.php');

//получение данных методом POST из формы
if (isset($_POST)) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $name_a = $_POST['name_a'];
}
else{
    //вывод предупреждения если страница не добавилась
    echo "Страница не добавилась!";
}
//добавление названия и цены книги в БД
$sql = "INSERT INTO books (title,price) VALUES ('$name','$price')";
//var_dump($sql);
$pdo->query($sql);
$sql = $pdo->query("SELECT id FROM books");
$sql = $sql->fetchAll();
$sql = $sql[count($sql)-1];
$idB = $sql['id'];
//добавление имя автора книги в БД
$sql = "INSERT INTO authors (name) VALUES ('$name_a')";
$pdo->query($sql);
$sql = $pdo->query("SELECT id FROM authors");
$sql = $sql->fetchAll();
$sql = $sql[count($sql)-1];
$idA = $sql['id'];
//добавление названия,цены и автора книги в БД в связующию таблицу
$sql="INSERT INTO books_authors (id_author, id_books) VALUES ('$idA','$idB')";
$pdo->query($sql);
//переход на главную страницу
header('Location:index.php');