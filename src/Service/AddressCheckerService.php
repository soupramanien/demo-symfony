<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;


class AddressCheckerService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    function checkAddress(string $address)
    {
        $response = $this->client->request(
            'POST',
            'http://localhost:8000/address-checker',
            [
                'json' => ['address' => $address]
            ]
        );
        $decodedPayload = $response->toArray();
        return $decodedPayload["valid"];
    }
}
