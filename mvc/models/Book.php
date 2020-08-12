<?php

class Book
{
    public function getBooklist()
    {
        //запрос к БД
        $host = 'localhost/Bookshelf_server';
        $db = 'bookshelf_db';
        $user = 'sa';
        $password = 'sa';

        $db = new PDO("mysql:host=$host;dbname=$db", $user, $password);

        $booklist = array();

        $result = $db->query('SELECT Id_book, Name from Book Order by Name');

        $i = 0;
        while ($row = $result->fetch())
        {
            $booklist[$i]['id'] = $row['id'];
            $booklist[$i]['Name'] = $row['Name'];
            $i++;
        }

        if ($booklist != NULL)
            return $booklist;
        else
            return 'Empty';
    }

    public function getBookListByAuthor($id)
    {
        $host = 'localhost/Bookshelf_server';
        $db = 'bookshelf_db';
        $user = 'sa';
        $password = 'sa';

        $db = new PDO("mysql:host=$host;dbname=$db", $user, $password);

        $booklist = array();

        $result = $db->query('SELECT Id, Book_name from dbo.Get_author_books($id)');

        $i = 0;
        while ($row = $result->fetch())
        {
            $booklist[$i]['id'] = $row['id'];
            $booklist[$i]['Name'] = $row['Name'];
            $i++;
        }

        if ($booklist != NULL)
            return $booklist;
        else
            return 'Empty';
    }

    public function getBookById($id)
    {
        //Запрос к БД
        $host = 'localhost/Bookshelf_server';
        $db = 'bookshelf_db';
        $user = 'sa';
        $password = 'sa';

        $db = new PDO("mysql:host=$host;dbname=$db", $user, $password);

        $book = array();

        $result = $db->query('SELECT * from Book WHERE Id_book=$id');

        if ($result != NULL) {
            $row = $result->fetch();
            $book['id'] = $row['id'];
            $book['Name'] = $row['Name'];
            $book['Content'] = $row['Content'];

            return $book;
        }
        else
            return 'Empty';
    }
}