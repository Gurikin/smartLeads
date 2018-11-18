<?php
session_start();

include_once($_SERVER["DOCUMENT_ROOT"].'application/const.php');

/* Автозагрузчик классов */
spl_autoload_register(function ($class){
//	echo "<h1>$class</h1>\n";
	require_once($class.'.php');
});

/* Инициализация и запуск RouterController */
$route = RouterController::getInstance();
$route->route();

/* Вывод данных */
echo $route->getBody();