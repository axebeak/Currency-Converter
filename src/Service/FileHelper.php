<?php

namespace App\Service;

class FileHelper {

    private $currencies;

    public $rates;

    public function __construct($currencies, $rates = []){
        $this->currencies = explode(",",$currencies);

        foreach ($this->currencies as $cur){
          if (getenv($cur)){
            $array = [$cur => getenv($cur)];
            $rates = $rates + $array;
          } else {
            throw new \Exception("Value for the '".$cur."' currency not found.");
          }
        }
        $this->rates = $rates;
    }

    public function convert(int $val, string $cur) {
      if (!in_array($cur, $this->currencies)){
        throw new \Exception("Uknown currency");
      }
      return number_format((float)$val / $this->rates[$cur], 2, '.', '');
    }
}
