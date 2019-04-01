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


class MainController extends AbstractController {

    private $fileHelper;

    private $APIHelper;

    private $randomHelper;

    private $currencies;

    public function __construct(FileHelper $fileHelper, APIHelper $APIHelper, RandomHelper $randomHelper, $currencies){
        $this->currencies = explode(",",$currencies);
        $this->fileHelper = $fileHelper;
        $this->APIHelper = $APIHelper;
        $this->randomHelper = $randomHelper;
    }

    /**
    * @Route("/")
    */
    public function showDefault(){
        return $this->render('base.html.twig');
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
        throw new \Exception("Uknown parameters.");
    }

    public function showPage($slug){
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
