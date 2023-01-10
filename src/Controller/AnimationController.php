<?php

namespace App\Controller;

use App\Entity\Animation;
use App\Repository\AnimationRepository;
use App\Repository\VigneronRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimationController extends AbstractController
{
    #[Route('/animation', name: 'app_animation')]
    public function index(AnimationRepository $repository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
        $allAnimation = $repository->findBy([], ['nom' => 'ASC']);

        return $this->render('animation/index.html.twig', ['animations' => $allAnimation]);
    }

    #[Route('/animation/{id<\d+>}', name: 'app_animation_show')]
    #[Entity('animation', expr: 'repository.find(id)')]
    public function show(Animation $animation): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        return $this->render('animation/show.html.twig', ['animation' => $animation]);
    }
}
