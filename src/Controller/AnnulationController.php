<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnulationFacturationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnulationController extends AbstractController
{
    /**
     * Permet d'afficher la liste de tous les facturations
     * 
     * @Route("/annulations", name="annulations_index")
     * 
     */
    public function index(AnnulationFacturationRepository $repo)
    {
        $annulations = $repo->findAll();

        return $this->render('annulation/index.html.twig', [
            'annulations' => $annulations
        ]);
    }
}
