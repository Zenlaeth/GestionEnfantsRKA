<?php

namespace App\Form;

use App\Entity\CarteBancaire;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CarteBancaireType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('CARD_num', TextType::class, $this->getConfiguration("Numéro de carte", "Donnez un numéro de carte bancaire"))
            ->add('CARD_dateExp', DateType::class, $this->getConfiguration("Date d'expiration", "Donnez une date d'expiration"))
            ->add('CARD_crypto', IntegerType::class, $this->getConfiguration("Cryptogramme", "Donnez un cryptogramme"))
            ->add('CARD_nom', TextType::class, $this->getConfiguration("Nom", "Donnez un nom"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarteBancaire::class,
        ]);
    }
}
