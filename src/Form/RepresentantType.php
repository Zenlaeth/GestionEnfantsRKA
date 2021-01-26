<?php

namespace App\Form;

use App\Form\ApplicationType;
use App\Entity\RepresentantLegal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RepresentantType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('REPR_nom', TextType::class, $this->getConfiguration("Nom", "Donnez un nom"))
            ->add('REPR_prenom', TextType::class, $this->getConfiguration("Prenom", "Donnez un prénom"))
            ->add('REPR_adresse', TextType::class, $this->getConfiguration("Adresse", "Donnez une adresse"))
            ->add('REPR_tel', TextType::class, $this->getConfiguration("Numéro de téléphone", "Entrez un numéro de téléphone"))
            ->add('REPR_mail', TextType::class, $this->getConfiguration("Adresse mail", "Entrez une adresse mail"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RepresentantLegal::class
        ]);
    }
}
