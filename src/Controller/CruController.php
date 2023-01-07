<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CruController extends AbstractController
{
    #[Route('/cru', name: 'app_cru')]
    public function index(): Response
    {
        return $this->render('cru/index.html.twig', [
            'controller_name' => 'CruController',
        ]);
    }
}
