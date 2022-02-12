<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProduitControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/produit');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Liste des produits');
    }
}
