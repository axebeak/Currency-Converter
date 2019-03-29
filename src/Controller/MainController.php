<?php


namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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

    public function __construct(FileHelper $fileHelper, APIHelper $APIHelper, RandomHelper $randomHelper){
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
        $val = $request->query->get('val');
        $cur = $request->query->get('cur');
        $source = $request->query->get('source');
        return new JsonResponse(['response' => $this->convert($val, $cur, $source)]);
    }

    /**
     * @Route("/{slug}")
     */
    public function show($slug){
        switch ($slug){
            case 'local-file':
                $title = 'Local File';
                $request = 'local';
                $rates = ['EUR' => $this->fileHelper->EUR, 'USD' => $this->fileHelper->USD];
                break;
            case 'external-api':
                $title = 'External API';
                $request = 'api';
                $rates = ['EUR' => $this->APIHelper->EUR, 'USD' => $this->APIHelper->USD];
                break;
            case 'random':
                $title = 'Random Values';
                $request = 'random';
                $rates = ['EUR' => $this->randomHelper->EUR, 'USD' => $this->randomHelper->USD];
                break;
            default:
                throw new \Exception("'".$slug."' link not found, please use one of the following: 'local-file', 'external-api' or 'random'");
        }
        return $this->render('request.html.twig', [
            'title' => $title,
            'request' => $request,
            'rates' => $rates,
            ]);
    }

    public function convert($val, $cur, $source){
        switch ($source){
            case 'local':
                return $this->fileHelper->convert($val)[$cur];
            case 'api':
                return $this->APIHelper->convert($val)[$cur];
            case 'random':
                return $this->randomHelper->convert($val)[$cur];
            default:
                throw new \Exception("Provided source for currency exchange not found. Please use 'local', 'api', or 'random'.");
        }
    }
}
