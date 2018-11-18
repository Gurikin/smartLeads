<?php
/**
 * Created by PhpStorm.
 * User: gurikin
 * Date: 18.11.18
 * Time: 3:59
 */
?>

<?php
$timeStart = microtime(true);
foreach ($this->getDinamicContent() as $item) {
    echo $item;
}
$timeEnd = microtime(true);
echo "<hr><b>Объем используемой памяти: ";
print UtilModel::memoryTest();
echo "\n<hr>$count строк из файла были прочитаны за " . ((float)$timeEnd - (float)$timeStart) . " секунд.\n</b>";
?>