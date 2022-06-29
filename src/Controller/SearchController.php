<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ACSEO\TypesenseBundle\Finder\TypesenseQuery;

class SearchController extends AbstractController
{
    private $dataFinder;


    public function __construct($dataFinder)
    {
        $this->dataFinder=$dataFinder;
    }
    /**
     * @Route("/search", name="app_search")
     */
    public function index(): Response
    {
       

        $query = new TypesenseQuery('molestias', 'content');

        // Get Doctrine Hydrated objects
        $results = $this->dataFinder->rawQuery($query)->getResults();
         return $this->render('search/index.html.twig', [
            'results' =>$results,
        ]);

    }
}
