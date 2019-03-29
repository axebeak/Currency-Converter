<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RandomHelper {

    private $response;

    public $USD;

    public $EUR;

    public function __construct(){
        $this->response = new Response;

        $request = Request::createFromGlobals();

        if ($request->cookies->has('rates')){
          $result = json_decode($request->cookies->get('rates'));
          if (json_last_error() === JSON_ERROR_NONE) {
                if (isset($result->USD) and is_numeric($result->USD)){
                  $this->USD = $result->USD;
                }
                if (isset($result->EUR) and is_numeric($result->USD)){
                  $this->EUR = $result->EUR;
                }
          }
        }
        if (!isset($this->USD)){
          $this->USD = rand(5*100, 50*100)/100;
        }
        if (!isset($this->EUR)){
          $this->EUR = rand(10*100, 60*100)/100;
        }
        if (!$request->cookies->has('rates')){
          $this->setRatesCookie();
        }
    }

    public function setRatesCookie(){
      $cookie = $cookie = new Cookie('rates', json_encode(['USD' => $this->USD, 'EUR' => $this->EUR]), strtotime('now + 30 seconds'));
      $this->response->headers->setCookie($cookie);
      $this->response->send();
      return true;
    }

    public function convert(int $val) {
        return ['USD' => $val * $this->USD,
            'EUR' => $val * $this->EUR];
    }
}
