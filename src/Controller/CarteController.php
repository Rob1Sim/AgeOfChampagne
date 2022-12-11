<?php

namespace App\Controller;

use App\Entity\Carte;
use App\Repository\CarteRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
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

    #[Route('carte/{id}', requirements: ['id' => '\d+'])]
    #[Entity('carte', expr: 'repository.findWithCategory(id)')]
    public function show(Carte $carte): Response
    {
        return $this->render('carte/show.html.twig', ['carte' => $carte]);
    }
}
