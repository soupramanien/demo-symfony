<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddressCheckerController extends AbstractController
{
    #[Route('/address-checker', name: 'address_checker')]
    public function emailChecker(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $address = $data["address"];
        $valid = true;
        if (!str_contains(strtolower($address), 'paris')) {
            $valid = false;
        }
        //dummy logic
        $random = random_int(1, 10);
        $res = ["valid" => $valid];
        return $this->json($res);
    }
}
