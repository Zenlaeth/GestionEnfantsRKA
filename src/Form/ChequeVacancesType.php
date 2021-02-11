<?php

namespace App\Form;

use App\Entity\ChequeVacances;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ChequeVacancesType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('CHEV_montant', IntegerType::class, $this->getConfiguration("Numéro de carte", "Donnez un numéro de carte bancaire"))
            ->add('CHEV_validite', DateType::class, array(
                'required' => false,
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')+2),
                'label' => "Validité"
                ))
            ->add('CHEV_anneeEmission', DateType::class, array(
                'required' => false,
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-2),
                'label' => "Année d'emission"
                ))
            ->add('CHEV_nomTitulaire', TextType::class, $this->getConfiguration("Nom du titulaire", "Donnez un nom du titulaire"))
            ->add('CHEV_adresseTitulaire', TextType::class, $this->getConfiguration("Adresse du titulaire", "Donnez une adresse du titulaire"))
            ->add('CHEV_nomEmployeur', TextType::class, $this->getConfiguration("Nom de l'employeur", "Donnez un nom de l'employeur"))
            ->add('CHEV_adresseEmployeur', TextType::class, $this->getConfiguration("Adresse de l'employeur", "Donnez une adresse de l'employeur"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ChequeVacances::class,
        ]);
    }
}
