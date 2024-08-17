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

class UserController extends AbstractController
{
    #[Route('/user/{slug}-{id}', name: 'app_user')]
    public function index(Request $request): Response
    {   
        $allParams = $request->query->all();
        $user = $request->attributes->get('slug');
        $id = $request->attributes->get('id');
        return new Response('UserController '.$user.' id='.$id);
    }
    
    #[Route('/users', name: 'app_users')]
    public function getUsers(Request $request, UserRepository $userRepository): Response
    {   
        //dd($userRepository);
        $allParams = $request->query->all();
        $allUsers = $userRepository->findAll();
        return $this->render('user/users.html.twig', [
            'allUsers' => $allUsers,
        ]);
    }
    // Ajout utilisateur
    #[Route('/add-user', name: 'add_user')]
    public function addUser(Request $request, EntityManagerInterface $entityManager): Response
    {   
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
    
        // Traiter le formulaire soumis
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // Sauvegarder les données du formulaire dans la base de données
                $entityManager->persist($user);
                $entityManager->flush();                
                $this->addFlash('success', 'Utilisateur ajouté avec succès !');
                return $this->redirectToRoute('app_users');
            }
    
            return $this->render('user/adduser.html.twig', [
                'form' => $form->createView()
            ]);
    }

    // Supprimer utilisateur
    #[Route('/delete-user/{id}', name: 'delete_user')]
    public function deleteUser(Request $request, EntityManagerInterface $entityManager): Response
    {   
        $id = $request->attributes->get('id');
        $user = $entityManager->getRepository(User::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();
        $this->addFlash('alert', 'Utilisateur supprimé avec succès !');
        return $this->redirectToRoute('app_users');
    }
}
