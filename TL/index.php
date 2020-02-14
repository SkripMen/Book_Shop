<?php
//подключение бд
include ('connectBD.php');

//Вывод формы для добавления, удаления и редактирования книги
echo '
    <title>Главная</title>
    <link rel="stylesheet" href="main.css">
<div class="section" data-vide-bg="video/ocean">
    <div class="container1">
    <form method="post" action="process/addpage.php">
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
//вывод уже записанных книг на страницу
$sql = $pdo->query('select GROUP_CONCAT(distinct `authors`.`name`) as name , `books`.`price` as price ,GROUP_CONCAT(distinct `books`.`title`) as title from `authors`,`books`,`books_authors` where `books_authors`.`id_books` = `books`.`id` and `books_authors`.`id_author` = `authors`.`id` GROUP by `books`.`title`');
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
<!--футер-->
<div class="cop">Создано при поддержки АКВТ©</div>
';