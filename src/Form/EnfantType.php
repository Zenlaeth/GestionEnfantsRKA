<?php

namespace App\Form;



use App\Entity\Enfant;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EnfantType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ENF_Nom', TextType::class, $this->getConfiguration("Nom", "Donnez un nom"))
            ->add('ENF_Prenom', TextType::class, $this->getConfiguration("Prenom", "Donnez un prénom"))
            ->add('ENF_Note', IntegerType::class, $this->getConfiguration("Note", "Entrez une note sur 5"))
            ->add('ENF_Description', TextareaType::class, $this->getConfiguration("Description", "Donnez une description de l'enfant (ses qualités et ses défauts)"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enfant::class,
        ]);
    }
}
