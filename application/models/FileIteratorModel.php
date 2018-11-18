<?php
/**
 * Created by PhpStorm.
 * User: gurikin
 * Date: 16.11.18
 * Time: 22:23
 */

class FileIteratorModel implements SeekableIterator
{
    private $_filePath = "source/myphp/text.txt";
    private $_key = 0;
    private $_currentString = 0;
    /**
     * @var Generator
     */
    private $_fileGenerator;
    /**
     * @var Generator
     */
    private $_tempGenerator;
    /**
     * @var int
     * count of strings in file
     */
    private $_count = 0;

    /**
     * FileIterator constructor.
     * Put the Generator object ot _fileGenerator field
     * @param $fileName
     */
    public function __construct($fileName) {
        $this->_filePath = $fileName;
        $this->_fileGenerator = $this->readTheFile($this->_filePath);
        $this->_tempGenerator = $this->copyGen();
        $this->_currentString = $this->_tempGenerator->current();
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        if ($this->valid()) {
            $this->_currentString = $this->_tempGenerator->current();
        }
        return $this->_currentString;
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->_tempGenerator->next();
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        $this->_key = $this->_tempGenerator->key();
        return $this->_key;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return $this->_tempGenerator->valid();
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->_tempGenerator = $this->copyGen();
        $this->_key = 0;
        $this->clearCurrent();
        if ($this->valid()) {
            $this->_currentString = $this->current();
        }
    }

    /**
     * Seeks to a position
     * @link http://php.net/manual/en/seekableiterator.seek.php
     * @param int $position <p>
     * The position to seek to.
     * Need to remind that the position - it's a position of string
     * in file (start from 1)
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function seek($position)
    {
        $position--;
        $condition = ($this->key() < $position) ? (1) : /*($this->key() == $position) ? 0 :*/ (-1);
        switch ($condition) {
            case (-1):
                $this->_tempGenerator = $this->copyGen();
            case 1:
                for ($i=$this->key(); $i<$position; $i++) {
                    $this->next();
                }
                $this->_currentString = $this->_tempGenerator->current();
                break;
            default:
                break;
        }
    }

    /**
     * @param array $strNumbers
     * @return Generator - the collection of read from file lines
     */
    public function readCustomStringGenerator($strNumbers = array()) {
        for ($i=0;$i<count($strNumbers); $i++) {
            $position = $strNumbers[$i];
            echo $strNumbers[$i] . "\t";
            $this->seek($position);
//            echo $this->current();
            yield $this->current() . "\n";
        }
    }

    private function copyGen() {
        return $this->readTheFile($this->_filePath);
    }

    /**
     * @param Generator $iterator
     * @return int - count of strings in iterable file
     */
    private function getCount(Generator $iterator) {
        return iterator_count($iterator); //~25 000 000 lines is count in ~(2.5 - 3.0) sec on core i5 8Gb memory under Ubuntu 18.04 (in console)
    }

    /**
     * @param $path
     * @return Generator with content of file
     */
    private function readTheFile($path) {
        $handle = fopen($path, "r");
        $i = 0;
        while(!feof($handle)) {
            $line = fgets($handle);
            yield $line;
            $i++;
        }
        fclose($handle);
    }

    private function clearCurrent()
    {
        $this->_currentString = null;
    }


    //TODO move to util class
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