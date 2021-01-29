<?php

namespace App\Form;

use App\Entity\Materiel;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class MaterielType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('MAT_Ref', TextType::class, $this->getConfiguration("Référence", "Donnez une référence"))
            ->add('MAT_Libelle', TextType::class, $this->getConfiguration("Libelle", "Donnez un libelle"))
            ->add('MAT_Quantite', IntegerType::class, $this->getConfiguration("Quantité", "Donnez un quantité"))
            ->add('MAT_QuantiteSortie', IntegerType::class, $this->getConfiguration("Quantité sortie", "Donnez une quantité sortie"))
            ->add('MAT_QuantitePerdu', IntegerType::class, $this->getConfiguration("Quantité perdu", "Donnez une quantité perdu"))
            ->add('MAT_QuantiteVendu', IntegerType::class, $this->getConfiguration("Quantité vendu", "Donnez une quantité vendu"))
            ->add('MAT_QuantiteTotal', IntegerType::class, $this->getConfiguration("Quantité total", "Donnez une quantité total"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Materiel::class,
        ]);
    }
}
