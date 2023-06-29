<?php

namespace App\Tests\Repository;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class ProduitRepositoryKernelTest extends KernelTestCase
{
    public function testFindByAll_ProduitRepository(): void
    {
        $kernel = self::bootKernel();
        $this->assertSame('test', $kernel->getEnvironment());
        $container = static::getContainer();
        $repo = $container->get(ProduitRepository::class);
        $produitList = $repo->findAll();
        $this->assertEquals(10, count($produitList), "on attend 10 produits");
    }
    public function testFindByName_ProduitRepository(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();
        $repo = $container->get(ProduitRepository::class);
        $produitList = $repo->findByName("produit1");
        $this->assertEquals(1, count($produitList), "on attend 1 produit");
        $this->assertEquals(3, $produitList[0]->getPrix(), "la valeur attendue est 3");
    }
}
