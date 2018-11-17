<?php
/**
 * Created by PhpStorm.
 * User: gurikin
 * Date: 16.11.18
 * Time: 7:19
 */

class FileObject
{
    function rand_line($fileName) {
        do{
            $fileSize=filesize($fileName);
            $fp = fopen($fileName, 'r');
            fseek($fp, rand(0, $fileSize));
            $data = fread($fp, 4096);  // assumes lines are < 4096 characters
            fclose($fp);
            $a = explode("\n",$data);
        }while(count($a)<2);
        echo rand_line("file.txt");  // change file name
        return $a[1];

    }



}