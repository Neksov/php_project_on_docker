<?php
define('ROOT', dirname(__FILE__) . '/');
define('HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('PAGE', $basename = basename($_SERVER['SCRIPT_NAME']));

global $menu;
$menu = [
    'index.php' => 'Home',
    'about.php' => 'About me',
    'post.php' => 'Post',
    'contact.php' => 'Contact',
];

global $title;

foreach ($menu as $page => $value) {
    if(PAGE == $page) $title = $value;
}

