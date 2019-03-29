<?php

namespace App\Service;

class FileHelper {

    public $USD;

    public $EUR;

    public function __construct($USD, $EUR){
        $this->USD = $USD;

        $this->EUR = $EUR;
    }

    public function convert(int $val){
        return ['USD' => $val * $this->USD,
            'EUR' => $val * $this->EUR];
    }
}
