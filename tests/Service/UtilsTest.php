<?php

namespace App\Tests\Service;

use App\Service\Utils;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function puissanceProvider()
    {
        return [
            '2 puissance 3' => [2, 3, 8, "2 puissance 3"],
            '1000 puissance 0' => [1000, 0, 1, "1000 puissance 0"],
            '0 puissance 0' => [0, 0, 1, "0 puissance 0"],
            '1000 puissance 2' => [1000, 2, 1000000, "1000 puissance 2"]
        ];
    }
    /**
     * @dataProvider puissanceProvider
     */
    public function testPuissance($a, $b, $expected, $msg)
    {
        //appeler la fonction et stocker le résultat
        $res = Utils::puissance($a, $b);
        $this->assertSame($expected, $res, $msg);
    }
    public function testPuissanceThrowsInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);
        $a = 5;
        $n = -3;
        Utils::puissance($a, $n);
    }

    public function testNominal(): void
    {
        $res = Utils::puissance(2, 3);
        $this->assertEquals(8, $res, "resultat attendu est de 8");
    }

    /**
     * tests de la méthode getFullname
     */
    public function getFullnameProvider()
    {
        return [
            'test 1: without accent'  => ["johann", "griffe", "Johann GRIFFE"],
            'test 2: with accent'  => ["évan", "êtan", "Évan ÊTAN"],
            'test 3: with accents'  => ["évïn", "êtaön", "Évïn ÊTAÖN"],
            'test 4: grec'  => ["αλώπηξ ", "βαφής", "Αλώπηξ  ΒΑΦΉΣ"],
        ];
    }

    /**
     * @dataProvider getFullnameProvider
     */
    public function testGetFullname(string $prenom, string $nom, string $expected)
    {
        //appeler la fonction et stocker le résultat
        $res = Utils::getFullname($nom, $prenom);
        $this->assertEquals($expected, $res);
    }
}
