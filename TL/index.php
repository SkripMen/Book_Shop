<?php
//подключение бд
include ('connectBD.php');

echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Directory</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

    <div class="container1">
   <!--форма передачи данных в бд-->
    <form method="POST" action="addpage.php">
        <input name="name" placeholder="Название книги">
        <input name="price" placeholder="Цена">
        <input name="name_a" placeholder="Имя автора">
        <br><br>

        <button type="submit" class="but">Добавить книгу</button>

    </form>
</div>

HTML;

$sql = $pdo->query('SELECT books.*, authors.* FROM books,authors,books_authors WHERE books_authors.id_books = books.id AND books_authors.id_author = authors.id');
$sql = $sql->fetchAll();
//var_dump($sql);
foreach ($sql as $row){
    echo $row['title'].' ';
    echo $row['price'].' ';
    echo $row['name'].'<br>';
}

//вызов функции вывода всех записей
/*
$mysql->getAllPost();*/