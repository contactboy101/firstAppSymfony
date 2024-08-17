<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(Request $request): Response
    {   
        $allParams = $request->query->all();
        //var_dump($allParams);
        $return = '';
        foreach($allParams as $key => $value) {
            $return .= $key.'='.$value.'<br/>';
        }
        $name = $allParams['name'];
        $firstname = $allParams['firstname'];
        return new Response('AboutController '.' '.$return);
    }
}
