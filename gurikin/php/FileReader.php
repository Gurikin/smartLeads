<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16.11.2018
 * Time: 12:01
 */

class FileReader
{
    private $_fileGenerator;
    public function __construct($fileName) {
        $this->_fileGenerator = GeneratorHelper::readTheFile($fileName);
    }

    public function readCustomStringsGenerator($strNumbers = array()) {
        $iter = $this->_fileGenerator;
        $i = 0;
        $num = 0;
        $max = count($strNumbers)-1;
        echo $max+1 . "<br>";
        foreach ($iter as $item) {
            if ($i == $strNumbers[$num]) {
//                echo ($strNumbers[$num]+1).".\t" . $item . "<br>\n";
                if ($num >= $max) {
                    break;
                }else {
                    $num++;
                }
            }
            $i++;
        }
    }

    public function getRandomIndexes($count) {
        $randomIndexes = array();
        for ($i=0;$i<$count;$i++) {
            $randomIndexes[] = random_int(0,25000000);
        }
        sort ($randomIndexes);
        $randomIndexes = array_unique($randomIndexes);
        $resultArr = array();
        foreach ($randomIndexes as $index) {
            $resultArr[] = $index;
        }
        return $resultArr;
    }
}

class GeneratorHelper {
    public static function getCount(Generator $functor) {
        return iterator_count($functor);
    }

    public static function readTheFile($path) {
        $handle = fopen($path, "r");
        while(!feof($handle)) {
            $line = fgets($handle);
            yield $line;
        }
        fclose($handle);
    }
}

$timeStart = microtime(true);
$count = 10000;
$fr = new FileReader('text.txt');
$randomIndexes = $fr->getRandomIndexes($count);
$fr->readCustomStringsGenerator($randomIndexes);
$timeEnd = microtime(true);
echo "Объем используемой памяти: ";
require ('memory.php');
echo "\n<hr>$count строк из файла были прочитаны за " . ((float)$timeEnd - (float)$timeStart) . " секунд.\n";

function y () {
    for ($i=0; $i<10; $i++) {
        yield "String $i";
    }
}

$y = y();

echo $y->current();
$y->next();
echo $y->current();
var_dump($y);