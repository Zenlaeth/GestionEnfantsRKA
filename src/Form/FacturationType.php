<?php

namespace App\Form;



use App\Entity\Facturation;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class FacturationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FAC_MoyenPaiement', TextType::class, $this->getConfiguration("Moyen de paiement", "Donnez un moyen de paiement"))
            ->add('FAC_Code', IntegerType::class, $this->getConfiguration("Code", "Donnez un code"))
            ->add('FAC_Tarif', MoneyType::class, $this->getConfiguration("Tarif", "Entrez un tarif"))
            ->add('FAC_OptionPaiement', IntegerType::class, $this->getConfiguration("OptionPaiement", "Entrez le nombre de fois de paiement (en 1, 2, 3 fois...)"))
            ->add('FAC_Statut', TextType::class, $this->getConfiguration("Statut", "Donnez un statut"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facturation::class,
        ]);
    }
}
