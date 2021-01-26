<?php

namespace App\Form;



use App\Entity\Enfant;
use App\Form\ApplicationType;
use App\Form\RepresentantType;
use App\Entity\RepresentantLegal;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('ENF_DateNaiss', DateType::class, array(
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-18),
                'months' => range(date('m'), 12),
                'label' => "Date de naissance"
                ))
            ->add('ENF_Note', IntegerType::class, $this->getConfiguration("Note", "Entrez une note sur 5"))
            ->add('ENF_Description', TextareaType::class, $this->getConfiguration("Description", "Donnez une description de l'enfant (ses qualités et ses défauts)"))
            ->add('ENF_Parent',
            EntityType::class, [
            'class' => RepresentantLegal::class,
            'choice_label' => function ($representant) {
                return $representant->getREPRFullName();
            }
            ,
            'required' => true,
            'label' => "Représentant légal"
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enfant::class
        ]);
    }
}
