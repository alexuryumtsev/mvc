<?php

$DROOT = $_SERVER['DOCUMENT_ROOT'];
include $DROOT.'/configs/database.php';
require_once '/configs/lib/Twig/Autoloader.php';

// подключаем twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('apps/site/views/guestbook');
$twig = new Twig_Environment($loader, array(
    'cache'       => 'compilation_cache',
    'auto_reload' => true
));

// коннект к блазе
$dsn = "mysql:host=".host.";dbname=".db_name;
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO($dsn,user,pass, $opt);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}

// проверка uri'я
if ($_SERVER['REQUEST_URI'] == '/guestbook/') {
    include $DROOT.'/apps/site/controllers/guestbook.php';
} else {
    include $DROOT.'/apps/site/controllers/homepage.php';
}

