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
    echo "Страница не добавилась!";
}

$sql = "INSERT INTO books (title,price) VALUES ('$name','$price')";
$pdo->query($sql);
$sql = $pdo->query("SELECT id FROM books");
$sql = $sql->fetchAll();
$sql = $sql[count($sql)-1];
$idB = $sql['id'];

$sql = "INSERT INTO authors (name) VALUES ('$name_a')";
$pdo->query($sql);
$sql = $pdo->query("SELECT id FROM authors");
$sql = $sql->fetchAll();
$sql = $sql[count($sql)-1];
$idA = $sql['id'];

$sql="INSERT INTO books_authors (id_author, id_books) VALUES ('$idA','$idB')";
$pdo->query($sql);

header('Location:index.php');