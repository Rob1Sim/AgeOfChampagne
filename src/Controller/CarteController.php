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
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        if ('' == $request->query->get('category')) {
            $carte = $request->query->get('search', '');
            $carteList = $repository->search($carte);
        } else {
            $category = $request->query->get('category', '');
            $carteList = $repository->byCategory($category);
        }

        return $this->render('carte/index.html.twig', ['liste' => $carteList]);
    }

    #[Route('carte/{id}', name: 'app_carte_show', requirements: ['id' => '\d+'])]
    #[Entity('carte', expr: 'repository.find(id)')]
    public function show(Carte $carte): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        return $this->render('carte/show.html.twig', ['carte' => $carte]);
    }
}
