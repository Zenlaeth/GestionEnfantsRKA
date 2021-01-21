<?php

namespace App\Controller;

use App\Entity\Enfant;
use App\Entity\Facturation;
use App\Form\FacturationType;
use App\Entity\AnnulationFacturation;
use App\Entity\ModificationFacturation;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FacturationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FacturationController extends AbstractController
{
    /**
     * Permet d'afficher la liste de toutes les facturations
     * 
     * @Route("/facturations", name="facturations_index")
     * 
     */
    public function index(FacturationRepository $repo)
    {
        $facturations = $repo->findAll();

        return $this->render('facturation/index.html.twig', [
            'facturations' => $facturations
        ]);
    }

    /**
     * Permet d'afficher le formulaire de création d'une facturation
     * 
     * @Route("/facturations/new", name="facturations_create")
     * 
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $manager){
        $facturation = new Facturation();
        
        $form = $this->createForm(FacturationType::class, $facturation);

        $form->handleRequest($request);

        //Vérifier si le formulaire est correct
        if($form->isSubmitted() && $form->isValid()){
            $facturation->setFACAuteur($this->getUser());
            
            $manager->persist($facturation);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "La facture <strong>{$facturation->getFACCode()}</strong> a bien été enregistrée !"
            );

            //Redirection vers la liste
            return $this->redirectToRoute('facturations_index');
        }

        return $this->render('facturation/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Permet d'afficher le formulaire d'édition
     *
     * @Route("/facturations/edit/{id}", name="facturations_edit")
     * @param Facturation $facturation
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function edit(Facturation $facturation, Request $request, EntityManagerInterface $manager){

        $form = $this->createForm(FacturationType::class, $facturation);

        $form->handleRequest($request);

        //Vérifier si le formulaire est correct
        if($form->isSubmitted() && $form->isValid()){
            $modification = new ModificationFacturation();
            $modification->setMODIFAuteur($this->getUser());

            $modification->setFACCode($facturation->getFACCode());
            $modification->setFACEnfant($facturation->getFACEnfant());
            $modification->setFACOptionPaiement($facturation->getFACOptionPaiement());
            $modification->setFACTotal($facturation->getFACTotal());
            $modification->setFACMoyenPaiement($facturation->getFACMoyenPaiement());
            $modification->setFACTarif($facturation->getFACTarif());
            $modification->setFACStatut($facturation->getFACStatut());
            
            $manager->persist($modification);
            $manager->persist($facturation);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "Les modifications de la facture <strong>{$facturation->getFACCode()}</strong> ont bien été enregistrées !"
            );

            //Redirection vers la liste
            return $this->redirectToRoute('facturations_index');
        }

        return $this->render('facturation/edit.html.twig', [
            'form' => $form->createView(),
            'facturation' => $facturation
        ]);
    }

    /**
     * Permet d'annuler une facturation
     * 
     * @Route("/facturations/cancel/{id}", name="facturations_cancel")
     * 
     * @param Facturation $facturation
     * @param EntityManagerInterface $manager
     * @return Response
     */

    public function cancel(Facturation $facturation, EntityManagerInterface $manager) {
        $annulation = new AnnulationFacturation();
        
        $annulation->setANNUAuteur($this->getUser());

        $annulation->setFACCode($facturation->getFACCode());
        $annulation->setFACEnfant($facturation->getFACEnfant());
        $annulation->setFACOptionPaiement($facturation->getFACOptionPaiement());
        $annulation->setFACTotal($facturation->getFACTotal());
        $annulation->setFACMoyenPaiement($facturation->getFACMoyenPaiement());
        $annulation->setFACTarif($facturation->getFACTarif());
        $annulation->setFACStatut($facturation->getFACStatut());
        
    
        $manager->persist($annulation);
        $manager->remove($facturation);
        $manager->flush();

        //Message flash de confirmation
        $this->addFlash(
            'success',
            "La facture <strong>{$facturation->getFACCode()}</strong> a bien été annulée !"
        );
    
        return $this->redirectToRoute("facturations_index");
    }
}