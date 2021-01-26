<?php

namespace App\Controller;

use App\Entity\Materiel;
use App\Form\MaterielType;
use App\Repository\MaterielRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MaterielController extends AbstractController
{
    /**
     * Permet d'afficher la liste de tous les materiels
     * 
     * @Route("/materiels", name="materiels_index")
     * 
     */
    public function index(MaterielRepository $repo)
    {
        $materiels = $repo->findAll();

        return $this->render('materiel/index.html.twig', [
            'materiels' => $materiels
        ]);
    }

    /**
     * Permet d'afficher le formulaire de création d'un materiel
     * 
     * @Route("/materiels/new", name="materiels_create")
     * 
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $manager){
        $materiel = new Materiel();
        
        $form = $this->createForm(MaterielType::class, $materiel);

        $form->handleRequest($request);

        //Vérifier si le formulaire est correct
        if($form->isSubmitted() && $form->isValid()){
        
            $materiel->setMATAuteur($this->getUser());
            
            $manager->persist($materiel);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "Le materiel nommé <strong>{$materiel->getMATRef()}</strong> a bien été enregistrée !"
            );

            //Redirection vers la liste
            return $this->redirectToRoute('materiels_index');
        }

        return $this->render('materiel/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Permet d'afficher le formulaire d'édition
     *
     * @Route("/materiels/edit/{id}", name="materiels_edit")
     * 
     * @return Response
     */
    public function edit(Materiel $materiel, Request $request, EntityManagerInterface $manager){

        $form = $this->createForm(MaterielType::class, $materiel);

        $form->handleRequest($request);

        //Vérifier si le formulaire est correct
        if($form->isSubmitted() && $form->isValid()){
        
            $manager->persist($materiel);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "Les modifications du materiel nommé <strong>{$materiel->getMATRef()}</strong> ont bien été enregistrées !"
            );

            //Redirection vers la liste
            return $this->redirectToRoute('materiels_index');
        }

        return $this->render('materiel/edit.html.twig', [
            'form' => $form->createView(),
            'materiel' => $materiel
        ]);
    }

    /**
     * Permet de supprimer un materiel
     *
     * @Route("/materiels/delete/{id}", name="materiels_delete")
     * 
     * @param Materiel $materiel
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(Materiel $materiel, EntityManagerInterface $manager) {
        $manager->remove($materiel);
        $manager->flush();

        //Message flash de confirmation
        $this->addFlash(
            'success',
            "Le materiel nommé <strong>{$materiel->getMATRef()}</strong> a bien été supprimée !"
        );

        //Redirection vers la liste
        return $this->redirectToRoute("materiels_index");
    }
}