<?php

namespace App\Service;

class SettingsHelper {

    private $currencies;

    private $ENV;

    public function __construct($ENV){
        $this->ENV = $ENV;
    }


    public function initiate(array $currencies){
        $this->currencies = $currencies;

        if ($this->checkValues()){
            return $this->generateEnv();
        }
    }

    public function checkValues(){
        foreach ($this->currencies as $currency => $value){
            $indexes = array_keys($this->currencies, $currency);
            if (count($indexes) > 1){
                throw new \Exception($currency." added as a value more then once!");
            }
            if ($currency == 'UAH'){
                throw new \Exception('Can\'t set UAH - it\'s already a base currency');
            }
        }

        return true;
    }

    public function generateEnv(){
        $envCurrencies = 'CURRENCIES=';
        foreach ($this->currencies as $currency => $value){
            $envCurrencies = $envCurrencies.$currency.',';
        }
        $envCurrencies = rtrim($envCurrencies,',');
        $values = [];
        foreach ($this->currencies as $currency => $value){
            array_push($values,$currency."=".$value);
        }
        $envContent = [
        "#Currencies must be defined here, separated by commas:",
        $envCurrencies,
        "#Definitions of currencies for local file method:",
        $values,
        "#API for currency exchange rates:",
        "API_LINK=".getenv('API_LINK')];
        file_put_contents($this->ENV, "");
        foreach ($envContent as $line){
            if (is_array($line)){
                foreach ($line as $item){
                    file_put_contents($this->ENV,  $item.PHP_EOL, FILE_APPEND);
                }
            } else {
                file_put_contents($this->ENV, $line.PHP_EOL, FILE_APPEND);
            }
        }
        
        return true;
    }
}
