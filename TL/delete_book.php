<?
require('connectBD.php');
if (empty($_POST)) {
    echo '<link rel="stylesheet" href="main.css">';
    echo '<div><form action="delete_book.php" method="post" accept-charset="UTF-8"><p>';
    $result = $pdo->query('SELECT books.title, authors.name, books.id as idB, authors.id as idA FROM books,authors,books_authors WHERE books_authors.id_books = books.id AND books_authors.id_author = authors.id');
    $result = $result->fetchAll();
    echo '<select class="form-control" name="book">' .
        '<option value="Выберите книгу" selected="" disabled="">Выберите книгу</option>';
    for ($i=0;$i < count($result);++$i) {
        echo '<option value="'.$result[$i]['idA'].'|'.$result[$i]['idB'].'">'.$result[$i]['title'].' '.$result[$i]['name'].'</option>';
    }
    echo '</select></p>';
    echo '<p><input id="butt" type="submit" value="Удалить"></p>';
    echo '</form></div>';
} else {
    $IDarr = explode('|',$_POST['book']);
    $pdo->query('DELETE FROM books_authors WHERE id_author = '.$IDarr[0].' AND id_books = '.$IDarr[1].';');
    $pdo->query('DELETE FROM authors WHERE id = '.$IDarr[0].';');
    $pdo->query('DELETE FROM books WHERE id = '.$IDarr[1].';');
    header('Location: index.php');
}