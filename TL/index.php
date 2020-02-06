<?php
//подключение бд
include ('connectBD.php');

//Вывод формы для добавления книги
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container1">
    <form method="POST" action="addpage.php">
        <input name="name" placeholder="Название книги">
        <input name="price" placeholder="Цена">
        <input name="name_a" placeholder="Имя автора">

        <button type="submit" class="but">Добавить книгу</button>
    </form>
    <form action="delete_book.php">
    <button type="submit" class="but" id="del">Удалить книгу</button>
    </form>
</div>
</div>

HTML;

$sql = $pdo->query('SELECT books.*, authors.* FROM books,authors,books_authors WHERE books_authors.id_books = books.id AND books_authors.id_author = authors.id');
$sql = $sql->fetchAll();
//var_dump($sql);
foreach ($sql as $row){
    echo '<div class="book">'.$row['title'].' ';
    echo $row['price'].' ';
    echo $row['name'].'<br></div>';
}

//вызов функции вывода всех записей
/*
$mysql->getAllPost();*/