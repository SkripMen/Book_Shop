<?php
//подключение БД
require('connectBD.php');
if (empty($_POST)) {
    echo '<link rel="stylesheet" href="main.css">';
    echo '<div class="section" data-vide-bg="video/ocean">';
    echo '<div><form action="edit_book.php" method="post" accept-charset="UTF-8"><p>';
    $result = $pdo->query('SELECT books.title, authors.name, books.id as idB, authors.id as idA 
                                FROM books,authors,books_authors 
                                WHERE books_authors.id_books = books.id 
                                AND books_authors.id_author = authors.id');
    $result = $result->fetchAll();
    echo '<select class="form-control" name="book">' .
        '<option value="Выберите книгу" selected="" disabled="">Выберите книгу</option>';
    for ($i=0;$i < count($result);++$i) {
        echo '<option value="'.$result[$i]['idA'].'|'.$result[$i]['idB'].'">'.$result[$i]['title'].' '.$result[$i]['name'].'</option>';
    }
    echo '</select></p>';
    echo '<p><input id="butt" type="submit" value="Редактировать"></p>';
    echo '<p class="home"><a class="but" id="pls" data-tooltip="На главную" href="index.php"><i class="fa fa-home" aria-hidden="true">на главную</i>
</a></p>';
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
    $IDarr = explode('|',$_POST['book']);
    $result = $pdo->query('SELECT * FROM books,authors
                WHERE books.id = '.$IDarr[1].'
                and authors.id = '.$IDarr[0].';');
    $sql = $result->fetchAll();
    echo '<link rel="stylesheet" href="main.css">';
    echo '<div class="section" data-vide-bg="video/ocean">';
    echo '<div><form action="process_edit.php" method="post" accept-charset="UTF-8">
<p><input placeholder="Имя автора" name="name" type="text" value="'.$sql[0]['name'].'"></p>
<p><input placeholder="Название книги" name="title" type="text" value="'.$sql[0]['title'].'"></p>
<p><input placeholder="Цена" name="price" type="text" value="'.$sql[0]['price'].'"></p>
<p><input id="butt" type="submit" value="Изменить"></p>
</form></div><p id="but"><a href="index.php">На главную</a></p> </div>
    <!-- Подключение шрифтов -->
<script src="https://use.fontawesome.com/74811d09e3.js"></script>
    <!--подключение jquery-->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!--подключение vide.js-->
<script src="js/jquery.vide.min.js"></script>';
//Место для рекламы
    echo '<div class="cop">Создано при поддержки АКВТ©</div>';
}