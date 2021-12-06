<?php

namespace App\DataFixtures;

use App\Entity\Diplome;
use App\Entity\Experience;
use App\Entity\Projet;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder=$encoder;
    }

    public function load(ObjectManager $manager): void
    {
        //Utilisation de faker
        $faker = Factory::create('fr_FR');

        //Création d'un user
        $user = new User();
        $DDN = new \DateTime('19970903');

        $user->setEmail('romainbouchez62@gmail.com')
            ->setPrenomUser('Romain')
            ->setNomUser('Bouchez')
            ->setDateNaissanceUser($DDN)
            ->setGithubUser("http")
            ->setLinkedinUser('https://www.linkedin.com/in/romain-bouchez-678a1015a/');

        $password = $this->encoder->encodePassword($user,'password');

        $user->setPassword($password);

        $manager->persist($user);

        //Création de expériences
        for ($i=0; $i<10; $i++){

            $Experience = new Experience();
            $Experience->setNomExperience($faker -> words(3,true))
                ->setEntrepriseExperience($faker -> words(2,true))
                ->setDescriptifExperience($faker->text(50))
                ->setDateDebutExperience(new \DateTime($faker ->date($format = 'Y-m-d', $max = 'now')))
                ->setDateFinExperience(new \DateTime($faker -> date($format = 'Y-m-d', $max = 'now')))
                ->setUser($user);
            $manager->persist($Experience);
        }

        //Création de diplome
        for ($i=0; $i<3; $i++){

            $Diplome = new Diplome();
            $Diplome->setNomDiplome($faker->words(2,true))
                ->setDescriptifDiplome($faker->text(150))
                ->setDateObtentionDiplome(new \DateTime($faker->date($format = 'Y-m-d', $max = 'now')))
                ->setEcoleDiplome($faker->words(1,true))
                ->setUser($user);
            $manager->persist($Diplome);
        }

        //Création de projet
        for ($i=0;$i<10; $i++)
        {
            $Projet =new Projet();
            $Projet->setNomProjet($faker->words(5,true))
                ->setDescriptionProjet($faker->text(350))
                ->setLienProjet("https://github.com/RomainBouchez62/portfolio")
                ->setSlugProjet($faker->slug())
            ->setUser($user);
            $manager->persist($Projet);
        }

        $manager->flush();
    }
}
