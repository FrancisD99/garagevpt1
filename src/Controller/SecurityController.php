<?php

namespace App\Controller;

use App\Entity\User1;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * This controller allow us to loggin
     *
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    #[Route('/connexion', name: 'security.login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('pages/security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    
    /**
     *This controller allow us to logout
     *
     * @return void
     */
    #[Route('/deconnexion', name:'security.logout')]
    public function logout()
    {
        // Nothing to do here..
    }

     /**
     * This controller allow us to register
     *
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route ('/inscription', name: 'security.registration', methods: ['GET','POST'])]
    public function registration(Request $request, EntityManagerInterface $manager) : Response
    {   
        $user1 = new User1();
        $form = $this->createForm(RegistrationType::class, $user1);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           $user1 = $form->getData();

           $this->addFlash(
            'succès',
            'Votre compte à été bien créé.'
           ); 

           $manager->persist($user1);
           $manager->flush();

           return $this->redirectToRoute('security.login');
        }

        return $this->render('pages/security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
