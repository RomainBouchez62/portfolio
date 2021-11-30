<?php

namespace App\Tests;

use App\Entity\Experience;
use PHPUnit\Framework\TestCase;

class ExperienceUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $exp = new Experience();

        $Dbt = new \DateTime('20210101');
        $DFin = new \DateTime('20210110');
        $exp->setNomExperience("dev web")
            ->setDescriptifExperience("bla")
            ->setEntrepriseExperience("Entreprise")
            ->setDateDebutExperience($Dbt)
            ->setDateFinExperience($DFin);

        $this->assertTrue($exp->getNomExperience() === 'dev web');
        $this->assertTrue($exp->getDescriptifExperience() === 'bla');
        $this->assertTrue($exp->getEntrepriseExperience() === 'Entreprise');
        $this->assertTrue($exp->getDateDebutExperience() === $Dbt);
        $this->assertTrue($exp->getDateFinExperience() === $DFin);
    }

    public function testIsFalse(): void
    {
        $exp = new Experience();

        $Dbt = new \DateTime('20210101');
        $DFin = new \DateTime('20210110');
        $exp->setNomExperience("dev web")
            ->setDescriptifExperience("bla")
            ->setEntrepriseExperience("Entreprise")
            ->setDateDebutExperience($Dbt)
            ->setDateFinExperience($DFin);

        $Dbt2 = new \DateTime('20211201');
        $DFin2 = new \DateTime('20210111');
        $this->assertFalse($exp->getNomExperience() === 'dev ');
        $this->assertFalse($exp->getDescriptifExperience() === 'blafdf');
        $this->assertFalse($exp->getEntrepriseExperience() === 'Entrepffrfrise');
        $this->assertFalse($exp->getDateDebutExperience() === $Dbt2);
        $this->assertFalse($exp->getDateFinExperience() === $DFin2);
    }
}
