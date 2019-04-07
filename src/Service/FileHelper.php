<?php

namespace App\Service;

class FileHelper {

    public $rates;

    private $currencies;

    public function __construct($currencies, $rates = []){
        $this->currencies = explode(",",$currencies);

        foreach ($this->currencies as $cur){
          if (getenv($cur)){
            $array = [$cur => getenv($cur)];
            $rates = $rates + $array;
          } else {
            throw new \Exception(sprintf("Value for the '%s' currency not found.", $cur));
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
}
