<?php

namespace App\DataFixtures;

use App\Entity\Competence;
use App\Entity\Diplome;
use App\Entity\Experience;
use App\Entity\Image;
use App\Entity\Projet;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Provider\DateTime;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
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
        $roles = array('ROLE_ADMIN');

        $user->setEmail('romainbouchez62@gmail.com')
            ->setPrenomUser('Romain')
            ->setNomUser('Bouchez')
            ->setRoles($roles)
            ->setDateNaissanceUser($DDN)
            ->setGithubUser("https://github.com/RomainBouchez62")
            ->setLinkedinUser('https://www.linkedin.com/in/romain-bouchez-678a1015a/');

        $password = $this->encoder->hashPassword($user,'password');

        $user->setPassword($password);

        $manager->persist($user);

        //Création de expériences
        for ($i=0; $i<10; $i++){

            $Experience = new Experience();
            $Experience->setNomExperience($faker -> words(3,true))
                ->setEntrepriseExperience($faker -> words(2,true))
                ->setDescriptifExperience($faker->text(50))
                ->setDateDebutExperience(new \DateTime($faker ->date($format = 'd-m-Y', $max = 'now')))
                ->setDateFinExperience(new \DateTime($faker -> date($format = 'd-m-Y', $max = 'now')));
            $manager->persist($Experience);
        }

        //Création de diplome
        for ($i=0; $i<3; $i++){

            $Diplome = new Diplome();
            $Diplome->setNomDiplome($faker->words(2,true))
                ->setDescriptifDiplome($faker->text(150))
                ->setDateObtentionDiplome(new \DateTime($faker->date($format = 'd-m-Y', $max = 'now')))
                ->setEcoleDiplome($faker->words(1,true));
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
                    ->setImage('vide.jpg')
                    ->setUpdatedAt($faker->dateTimeBetween('-6 month','now'));

            for ($j=0;$j<3;$j++)
            {
                $tabImag=['/design/img/slide1.jpg','/design/img/slide2.jpg','/design/img/slide3.jpg'];
                $Image = new Image();
                $Image->setImage($tabImag[$j])
                    ->setUpdatedAt(new \DateTime('now'))
                    ->setProjet($Projet);

                $manager->persist($Image);
            }

            $manager->persist($Projet);
        }

        //Liaison d'image aux projets créés
//            for ($i=0;$i<3;$i++)
//            {
//
//                        $Pro = new Projet();
//
//                        $tabImag=['/design/img/slide1.jpg','/design/img/slide2.jpg','/design/img/slide3.jpg'];
//                        $Image = new Image();
//                        $Image->setImage($tabImag[$i])
//                            ->setUpdatedAt(new \DateTime('now'))
//                            ->setProjet();
//
//                        $manager->persist($Image);
//            }


        //Création de compétences
        $tabNivComp = ['débutant','intermédiaire','confirmé'];

        for ($i=0; $i<5;$i++)
        {
            $Competence = new Competence();
            $Competence->setNomCompetence($faker->word(1))
                        ->setNiveauCompetence($tabNivComp[array_rand($tabNivComp,1)])
                        ->setImage('competence.jpg')
                        ->setUpdatedAt($faker->dateTimeBetween('-6 month','now'));
            $manager->persist($Competence);
        }
        $manager->flush();
    }
}
