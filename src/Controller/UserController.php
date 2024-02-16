<?php

namespace App\Controller;

use App\Entity\User; // Import correct de la classe User
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user', methods: ['GET'])]
    public function index(UserRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {   
        $user = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), 
            5 
        );

        return $this->render('user/index.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/user/nouveau' , name: 'user.new', methods: ['GET', 'POST'])] // Correction de la route
    public function new (
        Request $request,
        EntityManagerInterface $manager
        ): Response
    {
        $user = new User(); // Correction du nom de classe
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            
            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success', 'L\'utilisateur a été créé avec succès.');

        }

        return $this->render('first/new.html.twig', [ // Correction du chemin du template
            'form' => $form->createView()
        ]);
    }

    #[Route('/user/edition/{id}', name: 'user.edit', methods: ['GET','POST'])]
    public function edit(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Charger l'utilisateur depuis la base de données en utilisant l'EntityManager
        $user = $entityManager->getRepository(User::class)->find($id);

        // Vérifier si l'utilisateur existe
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Créer le formulaire en utilisant l'utilisateur chargé
        $form = $this->createForm(UserType::class, $user);

        // Gérer la soumission du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Persister les changements dans la base de données
            $entityManager->flush();

            // Ajouter un message flash pour confirmer la réussite de l'édition
            $this->addFlash('success', 'L\'utilisateur a été édité avec succès.');

            
        }

        // Afficher le formulaire
        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/user/suppression/{id}', 'user.delete', methods: ['GET'])]
    public function delete(
        EntityManagerInterface $manager, 
        User $user
        ) : Response
    {
        $manager->remove($user);
        $manager->flush();

        $this->addFlash
        ('success', 
        'L\'utilisateur a été supprimé avec succès.');

        return $this->redirectToRoute('user.index');
    }
}
