<?php
//настройки системы - правила составления маршрутов
return array(
    'home/[0-9]+' => 'home/open',
    'home' => 'home/list',
    'book' => 'book/read'
);