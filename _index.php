<?php
include_once($_SERVER["DOCUMENT_ROOT"].'/data/const.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/data/UtilClass.php');

/* Автозагрузчик классов */
function __autoload($class){
	//echo "<h1>$class</h1>";
	require_once($class.'.php');	
}

session_start();

/* Инициализация и запуск FrontController */
$front = FrontController::getInstance();
$front->route();

/* Вывод данных */
echo $front->getBody();