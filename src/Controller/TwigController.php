<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwigController extends AbstractController
{
    #[Route('/twig', name: 'app_twig')]
    public function index(): Response
    {
        $tabs = [
            'nom' => 'Mika',
            'age' => 2
        ];
        
        return $this->render('twig/index.html.twig', [
            'controller_name' => 'TwigController',
            'slug' => 'new slug',
            'tabs' => $tabs
        ]);
    }
}
