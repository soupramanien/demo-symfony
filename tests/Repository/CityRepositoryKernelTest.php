<?php

namespace App\Tests\Repository;

use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CityRepositoryKernelTest extends KernelTestCase
{
    public function test_findHighlyPopulatedCity(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();
        $repo = $container->get(CityRepository::class);
        $city = $repo->findHighlyPopulatedCity();
        $nomVilleAttendu = "New York";
        $populationVilleAttendu = 8550000;

        $this->assertNotNull($city, "Ville ne doit pas être null"); //vérifier si city n'est pas null
        $this->assertEquals($nomVilleAttendu, $city->getName(), "nom de la ville attandu: New York"); //vérifier si city n'est pas null
        $this->assertEquals($populationVilleAttendu, $city->getPopulation(), "Population de la ville attandu: 8550000"); //vérifier si city n'est pas null

    }
}
