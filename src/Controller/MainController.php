<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception;

use App\Service\FileHelper;
use App\Service\APIHelper;
use App\Service\RandomHelper;
use App\Service\SettingsHelper;


class MainController extends AbstractController {

    private $fileHelper;

    private $APIHelper;

    private $randomHelper;

    private $settingsHelper;

    private $currencies;

    public function __construct(FileHelper $fileHelper, APIHelper $APIHelper, RandomHelper $randomHelper, SettingsHelper $settingsHelper, $currencies){
        $this->currencies = explode(",",$currencies);
        $this->fileHelper = $fileHelper;
        $this->APIHelper = $APIHelper;
        $this->randomHelper = $randomHelper;
        $this->settingsHelper = $settingsHelper;
    }

    /**
    * @Route("/")
    */
    public function showDefault(){

        return $this->render('base.html.twig', [
          'default' => $this->renderView('home.html.twig',[
            'api_link' => getenv('API_LINK')
          ]),
        ]);
    }

    /**
    * @Route("/api")
    */
    public function endpoint(Request $request){
        if ($request->query->has('load-page')){
          $slug = $request->get('load-page');
          return $this->showPage($slug);
        }
        if ($request->query->has('rates')){
          $source = $request->get('rates');
          return new JsonResponse($this->getRates($source));
        }
        if ($request->query->has('val') && $request->query->has('cur') && $request->query->has('source')){
          return new JsonResponse($this->convert($request->get('val'), $request->get('cur'), $request->get('source')));
        }
        if ($request->query->has('currencies')){
            if ($this->createCur($request->get('currencies'))){
                return new JsonResponse(["success" => true]);
            }
            throw new \Exception(sprintf("Error processing the request. Please check the logs."));
        }
        throw new \Exception(sprintf("Uknown parameters."));
    }

    public function showPage($slug){
        if ('home' === $slug){
          return $this->render('home.html.twig',[
            'api_link' => getenv('API_LINK')
          ]);
        }
        if ('settings' === $slug){
          return $this->render('settings.html.twig', [
              'title' => 'Settings',
              'currencies' => $this->currencies,
              'rates' => $this->fileHelper->rates]);
        }
        switch ($slug){
            case 'local-file':
                $title = 'Local File';
                $rates = $this->fileHelper->rates;
                break;
            case 'external-api':
                $title = 'External API';
                $rates = $this->APIHelper->rates;
                break;
            case 'random':
                $title = 'Random Values';
                $rates = $this->randomHelper->rates;
                break;
            default:
                throw new \Exception(sprintf("'%s' link not found, please use one of the following: 'local-file', 'external-api' or 'random'", $slug));
        }

        return $this->render('request.html.twig', [
            'title' => $title,
            'rates' => $rates,
            'slug' => $slug
            ]);
    }

    public function getRates(string $source){
        if ('local-file' === $source){
          return $this->fileHelper->rates;
        }
        if ('external-api' === $source){
          return $this->APIHelper->rates;
        }
        if ('random' === $source){
          return $this->randomHelper->rates;
        }
        throw new \Exception(sprintf("Provided source for currency exchange not found: '%s'. Please use 'local', 'api', or 'random'.", $source));
      }

    public function createCur(string $cur){
        $curArray = json_decode($cur, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $this->settingsHelper->initiate($curArray);
        }

        return false;
    }

    public function convert(int $val, string $cur, string $source){
        if ('local-file' === $source){
            return $this->fileHelper->convert($val, $cur);
        }
        if ('external-api' === $source){
            return $this->APIHelper->convert($val, $cur);
        }
        if ('random' === $source){
            return $this->randomHelper->convert($val, $cur);
        }
        throw new \Exception(sprintf("Provided source for currency exchange not found: '%s'. Please use 'local', 'api', or 'random'.", $source));
    }
}
