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
            'API_LINK' => getenv('API_LINK')
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
            } else {
                throw new \Exception("Error processing the request. Please check the logs.");
            }
        }
        throw new \Exception("Uknown parameters.");
    }

    public function showPage($slug){
        switch ($slug){
            case 'home':
                return $this->render('home.html.twig',[
                  'API_LINK' => getenv('API_LINK')
                ]);
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
            case 'settings':
                return $this->render('settings.html.twig', [
                    'title' => 'Settings',
                    'currencies' => $this->currencies,
                    'rates' => $this->fileHelper->rates]);
            default:
                throw new \Exception("'".$slug."' link not found, please use one of the following: 'local-file', 'external-api' or 'random'");
        }
        return $this->render('request.html.twig', [
            'title' => $title,
            'rates' => $rates,
            'slug' => $slug
            ]);
    }

    public function getRates(string $source){
      switch ($source){
          case 'local-file':
              return $this->fileHelper->rates;
          case 'external-api':
              return $this->APIHelper->rates;
          case 'random':
              return $this->randomHelper->rates;
          default:
              throw new \Exception("Provided source for currency exchange not found. Please use 'local', 'api', or 'random'.");
      }
    }

    public function createCur(string $cur){
        $curArray = json_decode($cur, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $this->settingsHelper->initiate($curArray);
        }
        return false;
    }

    public function convert(int $val, string $cur, string $source){
        switch ($source){
            case 'local-file':
                return $this->fileHelper->convert($val, $cur);
            case 'external-api':
                return $this->APIHelper->convert($val, $cur);
            case 'random':
                return $this->randomHelper->convert($val, $cur);
            default:
                throw new \Exception("Provided source for currency exchange not found. Please use 'local', 'api', or 'random'.");
        }
    }
}
