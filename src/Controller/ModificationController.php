<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ModificationFacturationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModificationController extends AbstractController
{
    /**
     * Permet d'afficher la liste de tous les facturations
     * 
     * @IsGranted("ROLE_ADMIN")
     * @Route("/modifications", name="modifications_index")
     * 
     */
    public function index(ModificationFacturationRepository $repo)
    {
        $modifications = $repo->findAll();

        return $this->render('modification/index.html.twig', [
            'modifications' => $modifications
        ]);
    }
}
