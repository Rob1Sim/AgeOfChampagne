<?php

namespace App\Controller;

use App\Repository\CompteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil/{id<\d+>}', name: 'app_profil')]
    public function index(int $id, CompteRepository $repository): Response
    {
        $compte = $repository->search($id);


        return $this->render('profil/index.html.twig', [
            'compte' => $compte[0],
        ]);
    }
}
