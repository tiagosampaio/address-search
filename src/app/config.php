<?php

declare(strict_types = 1);

use function \DI\autowire;

return [
    \AddressSearch\ApiInterface::class => autowire(\AddressSearch\Api::class),
    \AddressSearch\Service\AddressInterface::class => autowire(\AddressSearch\Service\Address::class),
    \GuzzleHttp\ClientInterface::class => autowire(\GuzzleHttp\Client::class),
];
