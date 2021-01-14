<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Enfant;
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

        $manager->flush();
    }
}