<?php

namespace App\Controller;

use App\Entity\Enfant;
use App\Entity\Facturation;
use App\Form\FacturationType;
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
     * Permet d'afficher la liste de tous les facturations
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
            // ajout de l'enfant avec sa facturation
            
            $manager->persist($facturation);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "La facturation <strong>{$facturation->getFACCode()}</strong> a bien été enregistrée !"
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
     * 
     * @return Response
     */
    public function edit(Facturation $facturation, Request $request, EntityManagerInterface $manager){

        $form = $this->createForm(FacturationType::class, $facturation);

        $form->handleRequest($request);

        //Vérifier si le formulaire est correct
        if($form->isSubmitted() && $form->isValid()){
        
            $manager->persist($facturation);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "Les modifications de la facturation <strong>{$facturation->getFACCode()}</strong> ont bien été enregistrées !"
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
     * Permet de supprimer une facturation
     *
     * @Route("/facturations/delete/{id}", name="facturations_delete")
     * 
     * @param Facturation $facturation
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(Facturation $facturation, EntityManagerInterface $manager) {
        $manager->remove($facturation);
        $manager->flush();

        //Message flash de confirmation
        $this->addFlash(
            'success',
            "La facturation de <strong>{$facturation->getFACCode()}</strong> a bien été supprimée !"
        );

        //Redirection vers la liste
        return $this->redirectToRoute("facturations_index");
    }
}