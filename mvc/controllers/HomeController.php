<?php

class HomeController
{
    //вывод списка книг
    public function List()
    {
        /*
        $original_str = '12-08-2020';

        $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';

        $placement = 'Month: $2, Day: $1, Year: $3';

        echo preg_replace($pattern, $placement, $original_str);*/



        echo 'Home Controller.List() is executed!';
        return true;
    }

    public function Open()
    {
        echo 'opened';
        return true;
    }

    //отображения списка авторов
    public function Authors()
    {
        echo 'authors list';
    }
}