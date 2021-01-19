<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Enfant;
use App\Entity\Facturation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');

        // ROLE FIXTURES ----------------------------------------------------------------

        $adminRole = new Role();
        $formateurRole = new Role();

        //Role avec acces total
        $adminRole->setTitre('ROLE_ADMIN');
        //Role avec acces restreint (users interdit)
        $formateurRole->setTitre('ROLE_FORMATEUR');

        $manager->persist($adminRole);
        $manager->persist($formateurRole);

        // ADMIN FIXTURES ----------------------------------------------------------------

        $adminUser1 = new User();

        //Crypter le mdp
        $password=$this->encoder->encodePassword($adminUser1, 'password');

        $adminUser1->setNom('Oumar')
                    ->setPrenom('Thierno')
                    ->setEmail('thierno@symfony.com')
                    ->setPassword($password)
                    ->addUserRole($adminRole);
        $manager->persist($adminUser1);
        
        // USER FIXTURES ----------------------------------------------------------------
        
        $users =[];
        for($i = 1; $i <= 10; $i++) {
            $user = new User();

            //Crypter le mdp
            $password = $this->encoder->encodePassword($user, 'password');

            //creation aleatoire des donnees
            $user->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setEmail($faker->email)
                ->setPassword($this->encoder->encodePassword($user, 'password'))
                ->addUserRole($formateurRole);
            
            $manager->persist($user);
            $users[] = $user;
        }

        // ENFANT FIXTURES ----------------------------------------------------------

        $enfants = [];
        for($i = 1; $i <= 30; $i++) {
            $enfant = new Enfant();

            $user = $users[mt_rand(0, count($users) - 1)];

            //creation aleatoire des donnees
            $enfant->setENFNom($faker->lastName)
                        ->setENFPrenom($faker->firstName)
                        ->setENFNote(mt_rand(0,5))
                        ->setENFDescription($faker->paragraph(3))
                        ->setENFAuteur($user);

            $manager->persist($enfant);
            $enfants[]=$enfant;
        }

        // FACTURATION FIXTURES ----------------------------------------------------------
        
        $facturations = [];

        $FAC_tarif=["29.90","358.80","895.80", "159.90"];
        $FAC_moyenPaiement=["Chèque", "Carte bancaire", "Espèces"];
        $FAC_statut=["Payé", "En retard"];

        for($i = 1; $i <= 30; $i++) {
            $facturation = new Facturation();

            $enfant = $enfants[mt_rand(0, count($enfants) - 1)];

            //creation aleatoire des donnees
            $facturation->setFACEnfant($enfant)
                        ->setFACCode($faker->ean8)
                        ->setFACMoyenPaiement($FAC_moyenPaiement[mt_rand(0,sizeof($FAC_moyenPaiement)-1)])
                        ->setFACTarif($FAC_tarif[mt_rand(0,sizeof($FAC_tarif)-1)])
                        ->setFACOptionPaiement(mt_rand(1,10))
                        ->setFACStatut($FAC_statut[mt_rand(0,sizeof($FAC_statut)-1)]);

            $manager->persist($facturation);
            $facturations[]=$facturation;
        }

        $manager->flush();
    }
}