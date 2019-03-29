<?php

namespace App\Service;

class APIHelper {

    private $API;

    public $USD;

    public $EUR;

    public function __construct($API){
        $this->API = $API;

        $this->USD = number_format((float)$this->getRates()[0]->buy, 2, '.', '');

        $this->EUR = number_format((float)$this->getRates()[1]->buy, 2, '.', '');
    }

    private function getRates() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        return json_decode($response);

    }

    public function convert(int $val) {
        return ['USD' => $val * $this->USD,
            'EUR' => $val * $this->EUR];
    }
}
