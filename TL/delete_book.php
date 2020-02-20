<?
//подключение БД
require('connectBD.php');
//форма выбора книги для удаления
if (empty($_POST)) {
    echo '<link rel="stylesheet" href="main.css">';
    echo '<div class="section" data-vide-bg="video/ocean">
    <div><form action="delete_book.php" method="post" accept-charset="UTF-8"><p>';
    $result = $pdo->query('SELECT books.title, authors.name, books.id as idB, authors.id as idA FROM books,authors,books_authors WHERE books_authors.id_books = books.id AND books_authors.id_author = authors.id');
    $result = $result->fetchAll();
    echo '<select class="form-control" name="book">' .
        '<option value="Выберите книгу" selected="" disabled="">Выберите книгу</option>';
    for ($i=0;$i < count($result);++$i) {
        echo '<option value="'.$result[$i]['idA'].'|'.$result[$i]['idB'].'">'.$result[$i]['title'].' '.$result[$i]['name'].'</option>';
    }
    echo '</select></p>';
    echo '<p><input class="but" type="submit" value="Удалить"></p>';
    echo '</form></div></div>
    <!--подключение jquery-->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!--подключение vide.js-->
<script src="js/jquery.vide.min.js"></script>
//Место для рекламы
<div class="cop">Создано при поддержки АКВТ©</div>';
} else {
    //запрос в БД на удаления книги и автора
    $IDarr = explode('|',$_POST['book']);
    $pdo->query('DELETE FROM books_authors WHERE id_author = '.$IDarr[0].' AND id_books = '.$IDarr[1].';');
    $pdo->query('DELETE FROM authors WHERE id = '.$IDarr[0].';');
    $pdo->query('DELETE FROM books WHERE id = '.$IDarr[1].';');
    //переход на главную страницу
    echo'<script src="js/exit.js"></script>';
    //header('Location: index.php');
}