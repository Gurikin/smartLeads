<?php
/* Пути по-умолчанию для поиска файлов */
set_include_path(get_include_path()
        . PATH_SEPARATOR . 'application/controllers'
        . PATH_SEPARATOR . 'application/models'
        . PATH_SEPARATOR . 'application/views');
/* Имена файлов: views */
define('DEFAULT_FILE', $_SERVER["DOCUMENT_ROOT"] . 'application/views/default.php');

//define('IMAGE_DIR', $_SERVER["DOCUMENT_ROOT"] . '/data/img/');
define('TEXT_2GB', $_SERVER["DOCUMENT_ROOT"] . 'source/text.txt');

/* Шаблон для страниц */
define('LAYOUT_FILE', $_SERVER["DOCUMENT_ROOT"] . 'application/views/layout/layout.html');

/* Константы для работы с БД */
define('SERVER', 'localhost');
define('USER_NAME', 'gurikin');
define('PASSWORD', 'root');
define('DB_NAME', 'smartleads');