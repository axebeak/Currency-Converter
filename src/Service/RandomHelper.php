<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RandomHelper {

    private $response;

    private $currencies;

    public $rates;

    public function __construct($rates = [], $currencies){
        $this->response = new Response;

        $this->currencies = explode(",",$currencies);

        $request = Request::createFromGlobals();

        if ($request->cookies->has('rates')){
          $rateArray = json_decode($request->cookies->get('rates'));
          if (json_last_error() === JSON_ERROR_NONE) {
            foreach ($rateArray as $cur => $rate){
              if (is_numeric($rate) and in_array($cur, $this->currencies)){
                $rates = $rates + [$cur => $rate];
              }
            }
          }
          $this->rates = $rates;
        }
        if (!isset($this->rates)){
          $this->rates = [];
          foreach ($this->currencies as $cur){
            $val = rand(5*100, 50*100)/100;
            $item = [$cur => $val];
            $this->rates = $this->rates + $item;
          }
        }
        if (!$request->cookies->has('rates')){
          $this->setRatesCookie();
        }
    }

    public function setRatesCookie(){
      $cookie = new Cookie('rates', json_encode($this->rates), strtotime('now + 15 seconds'));
      $this->response->headers->setCookie($cookie);
      $this->response->send();
      return true;
    }

    public function convert(int $val, string $cur) {
      if (!in_array($cur, $this->currencies)){
        throw new \Exception("Uknown currency");
      }
      return number_format((float)$val / $this->rates[$cur], 2, '.', '');
    }
}
