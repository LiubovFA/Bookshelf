<?php

class Author
{
    public function List()
    {
        //запрос к БД
        $host = 'localhost/Bookshelf_server';
        $db = 'bookshelf_db';
        $user = 'sa';
        $password = 'sa';

        $db = new PDO("mysql:host=$host;dbname=$db", $user, $password);

        $Authorlist = array();

        $result = $db->query('SELECT Id_author, Full_name from Author Order by Full_name');

        $i = 0;
        while ($row = $result->fetch())
        {
            $Authorlistlist[$i]['id'] = $row['id'];
            $Authorlist[$i]['Name'] = $row['Name'];
            $i++;
        }

        if ($Authorlist != NULL)
            return $Authorlist;

        return 'Empty';
    }
}