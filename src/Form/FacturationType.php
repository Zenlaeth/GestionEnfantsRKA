<?php

namespace App\Form;



use App\Entity\Tarif;
use App\Entity\Enfant;
use App\Entity\Statut;
use App\Form\EnfantType;
use App\Entity\Facturation;
use App\Entity\CarteBancaire;
use App\Entity\MoyenPaiement;
use App\Form\ApplicationType;
use App\Form\CarteBancaireType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class FacturationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('FAC_Enfant',
            EntityType::class, [
            'class' => Enfant::class,
            'choice_label' => function ($enfant) {
                return $enfant->getENFFullName();
            }
            ,
            'required' => true,
            'label' => "Enfant"
        ])  
            ->add('FAC_Code', IntegerType::class, $this->getConfiguration("Code", "Donnez un code"))
            ->add('FAC_MoyenPaiement',
            EntityType::class, [
            'class' => MoyenPaiement::class,
            'choice_label' => function ($facturation) {
                return $facturation->getMoyenLibelle();
            }
            ,
            'required' => true,
            'label' => "Moyen de paiement"
        ])
            ->add('FAC_Tarif',
            EntityType::class, [
            'class' => Tarif::class,
            'choice_label' => 'Tarif_Libelle',
            'required' => true,
            'label' => "Tarif"
        ])
            ->add('FAC_OptionPaiement', IntegerType::class, $this->getConfiguration("Option de paiement", "Entrez le nombre de fois de paiement (en 1, 2, 3 fois...)"))
            ->add('FAC_Statut',
            EntityType::class, [
            'class' => Statut::class,
            'choice_label' => 'Statut_Libelle',
            'required' => true,
            'label' => "Statut"
        ])
            ->add('FAC_MoyenCB', CarteBancaireType::class, array('data_class' => null, 'label' => "Carte bancaire", 'required' => true)
            );
        ;

        /*$builder->addEventListener(
        	FormEvents::POST_SET_DATA, function (FormEvent $event) { // POST_SUBMIT

	            $form = $event->getForm(); //recuperation du formulaire
                $data = $event->getData();
                $moyenPaiement = $data->getFACMoyenPaiement();
                
                if ($moyenPaiement != null) {
                    if ($moyenPaiement->getMoyenLibelle() == "Carte bancaire") {
                        $form->add('Moyen_Libelle', CarteBancaireType::class);
                    } else {
                        $form->add('FAC_MoyenPaiement', CarteBancaireType::class);
                }
            }
        });*/
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facturation::class,
        ]);
    }
}
