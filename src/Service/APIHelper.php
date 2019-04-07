<?php

namespace App\Service;

class APIHelper {

    public $rates;

    private $API;

    private $currencies;

    public function __construct($API, $currencies, $rates = []){
        $this->API = $API;

        $this->currencies = explode(",",$currencies);

        foreach ($this->currencies as $cur){
          foreach ($this->fetchRates() as $rateArr){
            if ($rateArr->ccy == $cur){
              $rates = $rates + [$rateArr->ccy => $rateArr->buy];
            }
          }
          if (!array_key_exists($cur, $rates)){
            $rates = $rates + [$cur => 'No information available.'];
          }
        }

        foreach ($rates as $cur => $rate){
          if (is_numeric($rate)){
            $rates[$cur] = number_format((float)$rate, 2, '.', '');
          }
        }
        $this->rates = $rates;
    }

    public function convert(int $val, string $cur) {
      if (!in_array($cur, $this->currencies)){
        throw new \Exception(sprintf("Uknown currency: '%s'", $cur));
      }

      return number_format((float)$val / $this->rates[$cur], 2, '.', '');
    }

    private function fetchRates() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        return json_decode($response);
    }

}
