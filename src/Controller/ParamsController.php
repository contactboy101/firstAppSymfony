<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Form\UserType;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ParamsController extends AbstractController
{
    #[Route('/params/{id}-{slug}', name: 'app_params')]
    public function index(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {   
        $allParams = $request->query->all();
        $user = $request->attributes->get('slug');
        $id = $request->attributes->get('id');
        $user = $userRepository->find($id);
        
       //$user = new User();
        
        $form = $this->createForm(UserType::class, $user);
    
    // Traiter le formulaire soumis
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarder les données du formulaire dans la base de données
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_users');
        }

        return $this->render('params/index.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
//AJOUT DEvoir
    }
}
