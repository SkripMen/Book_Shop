<?php
//подключение бд
include ('connectBD.php');

//Вывод формы для добавления книги
echo '
<head>
    <title>Главная</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="section" data-vide-bg="video/ocean">
    <div class="container1">
    <form action="addpage.php">
        <input name="name" placeholder="Название книги">
        <input name="price" placeholder="Цена">
        <input name="name_a" placeholder="Имя автора">
        <button type="submit" data-tooltip="Добавление книги" class="but" id="pls"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
    </form>
    <form action="delete_book.php">
    <button type="submit" data-tooltip="Удаление книги" class="but" id="del"><i class="fa fa-trash" aria-hidden="true"></i></button>
    </form>
';

$sql = $pdo->query('SELECT books.*, authors.* FROM books,authors,books_authors WHERE books_authors.id_books = books.id AND books_authors.id_author = authors.id');
$sql = $sql->fetchAll();
foreach ($sql as $row){
    echo '<div class="book">'.$row['title'].' ';
    echo $row['price'].' ';
    echo $row['name'].'<br></div>';
}
echo '
</div>
</div>
    <!-- Подключение шрифтов -->
<script src="https://use.fontawesome.com/74811d09e3.js"></script>
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="js/jquery.vide.min.js"></script>
<div class="cop">Создано при поддержки АКВТ©</div>
';