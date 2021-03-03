<?php

namespace App\Form;

use App\Entity\Cheque;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ChequeType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('CHE_montant', TextType::class, $this->getConfiguration("Montant", "Donnez un montant"))
            ->add('CHE_montantLettres', TextType::class, $this->getConfiguration("Montant en lettres", "Donnez un montant en lettres"))
            ->add('CHE_nomBeneficiaire', TextType::class, $this->getConfiguration("Beneficiaire", "Donnez un nom"))
            ->add('CHE_lieu', TextType::class, $this->getConfiguration("Lieu", "Donnez un lieu"))
            ->add('CHE_date', DateType::class , array(
                'required' => false,
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-1),
                'months' => range(date('m'), 12),
                'label' => "Date du chèque"
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cheque::class,
        ]);
    }
}
