<?php

namespace App\Controller;

use App\Entity\Cru;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CruController extends AbstractController
{
    #[Route('/cru/{id}', name: 'app_cru_show', requirements: ['id' => '\d+'])]
    #[Entity('cru', expr: 'repository.find(id)')]
    public function show(Cru $cru): Response
    {
        return $this->render('cru/show.html.twig', ['cru' => $cru]);
    }
}
