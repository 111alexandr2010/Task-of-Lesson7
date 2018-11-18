<?php

class Calculator
{
    public $pathToFile = __DIR__ . "/data.txt";

    public function addition($a, $b)
    {
        $result = $a + $b;
        file_put_contents($this->pathToFile, "$a  +  $b = $result" . PHP_EOL, FILE_APPEND);
        return $result;
    }

    public function subtraction($a, $b)
    {
        $result = $a - $b;
        file_put_contents($this->pathToFile, "$a  -  $b = $result" . PHP_EOL, FILE_APPEND);
        return $result;
    }

    public function multiplication($a, $b)
    {
        $result = $a * $b;
        file_put_contents($this->pathToFile, "$a  *  $b = $result" . PHP_EOL, FILE_APPEND);
        return $result;
    }

    public function division($a, $b)
    {
        if ($b == 0) {
            echo 'Ошибка - деление на 0 !!!';
            return'';
        } else {
            $result = $a / $b;
            file_put_contents($this->pathToFile, "$a  /  $b = $result" . PHP_EOL, FILE_APPEND);
            return $result;
        }
    }
}