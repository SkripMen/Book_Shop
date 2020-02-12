<?php
//подключение бд
include ('connectBD.php');

//Вывод формы для добавления и удаления книги
echo '
<head>
    <title>Главная</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="section" data-vide-bg="video/ocean">
    <div class="container1">
    <form method="post" action="addpage.php">
        <input name="name" placeholder="Название книги">
        <input name="price" placeholder="Цена">
        <input name="name_a" placeholder="Имя автора">
        <button type="submit" data-tooltip="Добавление книги" class="but" id="pls"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
    </form>
    <p>
    <a class="but" id="pls" data-tooltip="Удаление книги" href="delete_book.php"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <a class="but" id="pls" data-tooltip="Редактирование книги" href="edit_book.php"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    </p>
';
//вывод уже записанный кник на страницу
$sql = $pdo->query('SELECT books.*, authors.* FROM books,authors,books_authors WHERE books_authors.id_books = books.id AND books_authors.id_author = authors.id');
$sql = $sql->fetchAll();
foreach ($sql as $row){
    echo '<div class="book">';
    echo '<h3>' .$row['title'] . '</h3>';
    echo '<p>' .'Цена: '. $row['price'] . ' руб.</p>';
    echo '<p>' .'Автор: '. $row['name'] . '</p></div>';
}
//подключение js скриптов
echo '
</div>
</div>
    <!-- Подключение шрифтов -->
<script src="https://use.fontawesome.com/74811d09e3.js"></script>
    <!--подключение jquery-->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!--подключение vide.js-->
<script src="js/jquery.vide.min.js"></script>
<!--Место для рекламы-->
<div class="cop">Создано при поддержки АКВТ©</div>
';