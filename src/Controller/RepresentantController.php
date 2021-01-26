<?php

namespace App\Controller;

use App\Entity\RepresentantLegal;
use App\Form\RepresentantType;
use App\Repository\RepresentantLegalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RepresentantController extends AbstractController
{
    /**
     * Permet d'afficher la liste de tous les representants
     * 
     * @Route("/representants", name="representants_index")
     * 
     */
    public function index(RepresentantLegalRepository $repo)
    {
        $representants = $repo->findAll();

        return $this->render('representant/index.html.twig', [
            'representants' => $representants
        ]);
    }

    /**
     * Permet d'afficher le formulaire de création d'un representant
     * 
     * @Route("/representants/new", name="representants_create")
     * 
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $manager){
        $representant = new RepresentantLegal();
        
        $form = $this->createForm(RepresentantType::class, $representant);

        $form->handleRequest($request);

        //Vérifier si le formulaire est correct
        if($form->isSubmitted() && $form->isValid()){
            
            $manager->persist($representant);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "Le representant nommé <strong>{$representant->getREPRFullName()}</strong> a bien été enregistrée !"
            );

            //Redirection vers la liste
            return $this->redirectToRoute('representants_index');
        }

        return $this->render('representant/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Permet d'afficher le formulaire d'édition
     *
     * @Route("/representants/edit/{id}", name="representants_edit")
     * 
     * @return Response
     */
    public function edit(RepresentantLegal $representant, Request $request, EntityManagerInterface $manager){

        $form = $this->createForm(RepresentantType::class, $representant);

        $form->handleRequest($request);

        //Vérifier si le formulaire est correct
        if($form->isSubmitted() && $form->isValid()){
        
            $manager->persist($representant);
            $manager->flush();

            //Message flash de confirmation
            $this->addFlash(
                'success',
                "Les modifications du representant nommé <strong>{$representant->getREPRFullName()}</strong> ont bien été enregistrées !"
            );

            //Redirection vers la liste
            return $this->redirectToRoute('representants_index');
        }

        return $this->render('representant/edit.html.twig', [
            'form' => $form->createView(),
            'representant' => $representant
        ]);
    }

    /**
     * Permet de supprimer un representant
     *
     * @Route("/representants/delete/{id}", name="representants_delete")
     * 
     * @param RepresentantLegal $representant
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(RepresentantLegal $representant, EntityManagerInterface $manager) {
        $manager->remove($representant);
        $manager->flush();

        //Message flash de confirmation
        $this->addFlash(
            'success',
            "Le representant nommé <strong>{$representant->getREPRFullName()}</strong> a bien été supprimée !"
        );

        //Redirection vers la liste
        return $this->redirectToRoute("representants_index");
    }
}