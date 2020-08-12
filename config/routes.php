<?php
//настройки системы - правила составления маршрутов
return array(
    'home/([a-z]+)/([0-9]+)' => 'home/$1/$2',
    'home' => 'home/list'

    /*'home/[0-9]+' => 'home/open',
    'home' => 'home/list',
    'book' => 'book/read'*/
);