<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteType;
use App\Repository\CompteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil/{id<\d+>}', name: 'app_profil')]
    public function index(int $id, CompteRepository $repository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
        $compte = $repository->search($id);

        return $this->render('profil/index.html.twig', [
            'compte' => $compte[0],
        ]);
    }

    #[Route('/profil/{id<\d+>}/update', name: 'app_profil_update')]
    public function update(ManagerRegistry $doctrine, Compte $compte, Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
        $form = $this->createForm(CompteType::class, $compte);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine->getManager()->flush();

            return $this->redirectToRoute('app_profil', ['id' => $compte->getId()]);
        }

        return $this->renderForm('profil/update.html.twig', ['form' => $form, 'compte' => $compte]);
    }
}
