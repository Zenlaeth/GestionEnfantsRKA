<?php

namespace App\Controller;

use App\Entity\Enfant;
use App\Form\EnfantType;
use App\Repository\EnfantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EnfantController extends AbstractController
{
    /**
     * Permet d'afficher la liste de tous les enfants
     * 
     * @Route("/enfants", name="enfants_index")
     * 
     */
    public function index(EnfantRepository $repo)
    {
        $enfants = $repo->findAll();

        return $this->render('enfant/index.html.twig', [
            'enfants' => $enfants
        ]);
    }

    /**
     * Permet d'afficher le formulaire de création d'un enfant
     * 
     * @Route("/enfants/new", name="enfants_create")
     * 
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $manager){
        $enfant = new Enfant();
        
        $form = $this->createForm(EnfantType::class, $enfant);

        $form->handleRequest($request);

        //Vérifier si le formulaire est correct
        if($form->isSubmitted() && $form->isValid()){
        
            $enfant->setENFAuteur($this->getUser());
            
            $manager->persist($enfant);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "L'enfant nommé <strong>{$enfant->getENFNom()}</strong> a bien été enregistrée !"
            );

            //Redirection vers la liste
            return $this->redirectToRoute('enfants_index');
        }

        return $this->render('enfant/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Permet d'afficher le formulaire d'édition
     *
     * @Route("/enfants/edit/{id}", name="enfants_edit")
     * 
     * @return Response
     */
    public function edit(Enfant $enfant, Request $request, EntityManagerInterface $manager){

        $form = $this->createForm(EnfantType::class, $enfant);

        $form->handleRequest($request);

        //Vérifier si le formulaire est correct
        if($form->isSubmitted() && $form->isValid()){
        
            $manager->persist($enfant);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "Les modifications de l'enfant nommé <strong>{$enfant->getENFNom()}</strong> ont bien été enregistrées !"
            );

            //Redirection vers la liste
            return $this->redirectToRoute('enfants_index');
        }

        return $this->render('enfant/edit.html.twig', [
            'form' => $form->createView(),
            'enfant' => $enfant
        ]);
    }

    /**
     * Permet de supprimer un enfant
     *
     * @Route("/enfants/delete/{id}", name="enfants_delete")
     * 
     * @param Enfant $enfant
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(Enfant $enfant, EntityManagerInterface $manager) {
        $manager->remove($enfant);
        $manager->flush();

        //Message flash de confirmation
        $this->addFlash(
            'success',
            "L'enfant nommé <strong>{$enfant->getENFNom()}</strong> a bien été supprimée !"
        );

        //Redirection vers la liste
        return $this->redirectToRoute("enfants_index");
    }
}