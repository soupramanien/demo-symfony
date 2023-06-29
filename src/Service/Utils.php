<?php
//https://sharemycode.fr/3qa
namespace App\Service;

use App\Exceptions\TaxeInvalidException;
use InvalidArgumentException;

class Utils
{
  /**
   * generates full name 
   * converts prenom to lowercase and then first letter of the result to uppercase
   * converts nom to uppercase
   * then generates new string by adding space between prenom and nom
   * @param string nom
   * @param string prenom String
   * @return string fullname
   * @example prenom="SouPramanien" nom="bouvanesvary" fullname="Soupramanien BOUVANESVARY"  
   */
  static function getFullname(string $nom, string $prenom)
  {
    // $nom = strtoupper($nom);
    $nom = mb_strtoupper($nom, 'UTF-8');
    $prenom = mb_strtoupper(mb_substr($prenom, 0, 1)) . mb_substr($prenom, 1);
    // $prenom = ucfirst($prenom);
    $prenom = mb_strtoupper(mb_substr($prenom, 0, 1)) . mb_substr($prenom, 1);
    return $prenom . ' ' . $nom;
  }
  /**
   * formats given price to euro
   * @return  euro formatted price
   */
  static function formatPrice(float $price)
  {
    return \NumberFormatter::formatCurrency($price, "EUR");
  }
  static function getTaxTypes()
  {
    return ["TAUX_REDUIT" => 5.5, "TAUX_NORMAL" => 20];
  }

  static function calculateTVA(float $price, string $taxType)
  {
    $taxTypes = self::getTaxTypes();
    if (!key_exists($taxType, $taxTypes)) {
      throw new TaxeInvalidException();
    }
    $tax = $taxTypes[$taxType];
    return $price * $tax / 100;
  }
  /**
   * calculates power of 
   * @param a integer
   * @param n integer must be greater than or equal to 0
   * @throws InvalidArgumentException if n < 0
   */
  static function puissance(int $a, int $n)
  {
    if ($n < 0) throw new InvalidArgumentException();
    $res = 1;
    for ($i = 0; $i < $n; $i++) {
      $res = $a * $res;
    }
    return $res;
  }
}
