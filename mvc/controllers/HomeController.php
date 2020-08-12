<?php

include_once ROOT.'/models/Book.php';


class HomeController
{
    //вывод списка книг
    public function List()
    {
        $book_array = array();
        $book_array = Book::getBookList();

        echo '<pre>';
        print_r($book_array);
        echo '</pre>';

        /*
        $original_str = '12-08-2020';

        $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';

        $placement = 'Month: $2, Day: $1, Year: $3';

        echo preg_replace($pattern, $placement, $original_str);*/

        return true;
    }

    public function Open()
    {
        echo 'HomeController.Open() is executed!';
        return true;
    }

    //отображения списка авторов
    public function Authors()
    {
        echo 'authors list';
    }
}