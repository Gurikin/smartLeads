<div class="jumbotron">
    <h1>SMART-LEADS</h1>
</div>

<?php
$timeStart = microtime(true);
foreach ($this->getDinamicContent() as $item) {
    echo $item . "<br>";
}
$timeEnd = microtime(true);
echo "<hr><b>Объем используемой памяти: ";
print UtilModel::memoryTest();
echo "\n<hr>$count строк из файла были прочитаны за " . ((float)$timeEnd - (float)$timeStart) . " секунд.\n</b>";
?>