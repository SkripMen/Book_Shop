<?php

include ('connectBD.php');

    //функция добавления новой записи
    public function AddNewPost($name, $price, $name_a, $surname)
    {

    }
/*
   //функция вывода всех записей
    function getAllPost()
    {
        //выборка данных
        $query = "SELECT * FROM books inner join ";
        //данные из запроса присаиваются в переменную
        if ($result = $this->query($query)) {
            //запускается цикл который разбирает предыдущую переменую на ассоциативный массив
            while ($row = $result->fetch_assoc()) {
                //вывод значений
                print "<div class=\"post\">";
                print "<div class=\"row\">";
                //присваивание классу имя
                print "<div class=\"column " . $row['type'] . "\">";
                print "<div class=\"content\">";
                print "<div class=\"img\">";
                print "<p>" . "<img src=" . $row['logo'] . ">" . "</p>";
                print "</div>";
                print "<div id='delete'>";
                //подключение к странице с функцией удаления
                print "<a href='delete.php?name=" . $row['name'] . "' >X</a>";
                print "</div>";
                print "<div id='edit'>";
                print "<br>";
                //подключение к странице с функцией изменения
                print "<a href='edit.php?name=" . $row['name'] . "' >Изменить</a>";
                print "</div>";
                print "<div class=\"text\">";
                print "<br>";
                print "<p>" . "Название компании : " . $row['name'] . "</p>";
                //print "<p>" ."Тип компании : " .$row['type']. "</p>";
                print "<p>" . "Дата создания : " . $row['date_cr'] . "</p>";
                print "<p>" . "Адрес офиса : " . $row['address'] . "</p>";
                print "<p>" . "Номер телефона :  " . $row['phonenumber'] . "</p>";
                print "<p>" . "Сайт : " . $row['site'] . "</p>";
                print "<p>" . "Описание деятельности : " . $row['description'] . "</p>";
                print "<p>" . "ФИО Директора : " . $row['boss_name'] . "</p>";
                print "<br>" . "<br>";
                print "</div>";
                print "</div>";
                print "</div>";
                print "</div>";
                print "</div>";
            }
        }

    }

    //функция изменения записей
    public function EditPage($name, $date_cr, $address, $phonenumber, $site, $description, $boss_name, $logo, $type)
    {
        $query = "UPDATE company SET name = '$name', date_cr = '$date_cr', 
                    address = '$address', phonenumber = '$phonenumber', site = '$site',
                    description = '$description', boss_name = '$boss_name', logo = '$logo',
                    type = '$type' WHERE name = '$name'";
        $this->query($query);
    }

    //вывод значений из бд в форму изменения
    public function getContentByName($name)
    {
        $query = "SELECT * FROM company   where name ='$name'";
        if ($result = $this->query($query)) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }
*/
}