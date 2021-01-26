<?php

namespace App\Form;

use App\Entity\CarteBancaire;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarteBancaireType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('CARD_num', TextType::class, $this->getConfiguration("Nom", "Donnez un nom"))
            ->add('CARD_dateExp', DateType::class, $this->getConfiguration("Nom", "Donnez un nom"))
            ->add('CARD_crypto', IntegerType::class, $this->getConfiguration("Nom", "Donnez un nom"))
            ->add('CARD_nom', TextType::class, $this->getConfiguration("Nom", "Donnez un nom"))
            ->add('CARD_Moyen')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarteBancaire::class,
        ]);
    }
}
