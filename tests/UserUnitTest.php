<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {

        $user = new User();
        $DDN = new \DateTime('19970903');
        $user->setNomUser("Bouchez")
            ->setPrenomUser("Romain")
            ->setEmail("romainbouchez62@gamil.com")
            ->setDateNaissanceUser($DDN)
            ->setGithubUser("http")
            ->setLinkedinUser("http")
            ->setPassword("1234");

        $this->assertTrue($user->getNomUser()=== 'Bouchez');
        $this->assertTrue($user->getPrenomUser()=== 'Romain');
        $this->assertTrue($user->getEmail()=== 'romainbouchez62@gamil.com');
        $this->assertTrue($user->getDateNaissanceUser()=== $DDN);
        $this->assertTrue($user->getGithubUser()=== 'http');
        $this->assertTrue($user->getLinkedinUser()=== 'http');
        $this->assertTrue($user->getPassword()=== '1234');
    }

    public function testIsFalse(): void
    {

        $user = new User();
        $DDN = new \DateTime(19970903);

        $user->setNomUser("Bouchez")
            ->setPrenomUser("Romain")
            ->setEmail("romainbouchez62@gamil.com")
            ->setDateNaissanceUser($DDN)
            ->setGithubUser("http")
            ->setLinkedinUser("http")
            ->setPassword("1234");

        $DDN = new \DateTime(19970913);
        $this->assertFalse($user->getNomUser()=== 'ff');
        $this->assertFalse($user->getPrenomUser()=== 'Romgtrgeain');
        $this->assertFalse($user->getEmail()=== 'romainbouregrechez62@gamil.com');
        $this->assertFalse($user->getDateNaissanceUser()=== $DDN);
        $this->assertFalse($user->getGithubUser()=== 'grez');
        $this->assertFalse($user->getLinkedinUser()=== 'httzrgsdp');
        $this->assertFalse($user->getPassword()=== '12dsqfr34');
    }

    public function testIsEmpty(): void
    {
        $user = new User();


        $this->assertEmpty($user->getNomUser());
        $this->assertEmpty($user->getPrenomUser());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getDateNaissanceUser());
        $this->assertEmpty($user->getGithubUser());
        $this->assertEmpty($user->getLinkedinUser());
        $this->assertEmpty($user->getPassword());
    }
}
