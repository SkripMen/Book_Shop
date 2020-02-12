<?php
//подключение БД
require('connectBD.php');
if (empty($_POST)) {
    echo '<link rel="stylesheet" href="main.css">';
    echo '<div class="section" data-vide-bg="video/ocean">';
    echo '<div><form action="edit_book.php" method="post" accept-charset="UTF-8"><p>';
    $result = $pdo->query('SELECT books.title, authors.name, books.id as idB, authors.id as idA FROM books,authors,books_authors WHERE books_authors.id_books = books.id AND books_authors.id_author = authors.id');
    $result = $result->fetchAll();
    echo '<select class="form-control" name="book">' .
        '<option value="Выберите книгу" selected="" disabled="">Выберите книгу</option>';
    for ($i=0;$i < count($result);++$i) {
        echo '<option value="'.$result[$i]['idA'].'|'.$result[$i]['idB'].'">'.$result[$i]['title'].' '.$result[$i]['name'].'</option>';
    }
    echo '</select></p>';
    echo '<p><input id="butt" type="submit" value="Редактировать"></p>';
    echo '<p class="home"><a href="index.php">На главную</a></p>';
    echo '</form></div>';
    echo '
</div>
    <!--подключение jquery-->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!--подключение vide.js-->
<script src="js/jquery.vide.min.js"></script>';
//Место для рекламы
    echo '<div class="cop">Создано при поддержки АКВТ©</div>';

} else {
    echo '<link rel="stylesheet" href="main.css">';
    echo '<div class="section" data-vide-bg="video/ocean">';
    echo '<div><form method="post" accept-charset="UTF-8">
<p><input placeholder="Имя автора" name="name" type="text" value="'.$sql['name'].'"></p>
<p><input placeholder="Название книги" name="title" type="text" value="'.$sql['title'].'"></p>
<p><input placeholder="Цена" name="price" type="text" value="'.$sql['price'].'"></p>
<p><input id="butt" type="submit" value="Изменить"></p>
</form></div><p id="but"><a href="index.php">На главную</a></p> </div>
    <!--подключение jquery-->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!--подключение vide.js-->
<script src="js/jquery.vide.min.js"></script>';
//Место для рекламы
    echo '<div class="cop">Создано при поддержки АКВТ©</div>';
//    $IDarr = explode('|',$_POST['book']);
//    $pdo->query("UPDATE 'books' SET 'title' = '.$_POST['title'].'");
//    $sql = $sql->fetchAll();
}