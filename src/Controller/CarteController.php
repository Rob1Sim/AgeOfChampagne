<?php

namespace App\Controller;

use App\Repository\CarteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    #[Route('/carte', name: 'app_carte')]
    public function index(Request $request, CarteRepository $repository): Response
    {
        $carte = $request->query->get('search', '');
        $carteList = $repository->search($carte);

        return $this->render('carte/index.html.twig', ['liste' => $carteList]);
    }
}
