<?php

//DB settings
define('DB_HOST', 'database');
define('DB_NAME', 'films_new');
define('DB_USER', 'root');
define('DB_PASS', 'tiger');

// Физический путь к корневой директории скрипта
define('ROOT', dirname(__FILE__) . '/');
define('HOST', 'https://' . $_SERVER['HTTP_HOST'] . '/');

print_r(HOST);