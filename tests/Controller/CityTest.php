<?php

namespace App\Tests\Controller;

use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertEquals;

class CityTest extends KernelTestCase
{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);
    }
    public function testFindHighlyPopulatedCity(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();
        $repo = $container->get(CityRepository::class);
        $newyork = $repo->findHighlyPopulatedCity();
        assertEquals("New York", $newyork->getName());
    }
}
