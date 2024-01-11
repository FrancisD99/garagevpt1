<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'app_first')]
    public function index(): Response
    {
        return $this->render('first/index.html.twig', [
            'controller_name' => 'FirstController',
        ]);
    }


    #[Route('/Qsm', name: 'app_Qsm')]
    public function Qsm(): Response
    {
        return $this->render('first/Qsm.html.twig', [
            'controller_name' => 'FirstController',
        ]);
    }


    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('first/contact.html.twig', [
            'controller_name' => 'FirstController',
        ]);
    }



    #[Route('/evenement', name: 'app_evenement')]
    public function evenement(): Response
    {
        return $this->render('first/evenement.html.twig', [
            'controller_name' => 'FirstController',
        ]);
    }


    #[Route('/vente', name: 'app_vente')]
    public function vente(): Response
    {
        return $this->render('first/vente.html.twig', [
            'controller_name' => 'FirstController',
        ]);
    }


    #[Route('/details', name: 'app_details')]
    public function details(): Response
    {
        return $this->render('first/details.html.twig', [
            'controller_name' => 'FirstController',
        ]);
    }
}