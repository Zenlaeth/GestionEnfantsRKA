<?php

namespace App\Form;



use App\Entity\Tarif;
use App\Entity\Enfant;
use App\Entity\Statut;
use App\Form\EnfantType;
use App\Entity\Facturation;
use App\Entity\MoyenPaiement;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

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
            'choice_label' => 'Moyen_Libelle',
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facturation::class,
        ]);
    }
}
