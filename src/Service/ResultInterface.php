<?php

declare(strict_types = 1);

namespace AddressSearch\Service;

use AddressSearch\Framework\Http\Response;
use AddressSearch\ObjectType\EntityInterface;

/**
 * Class ResultInterface
 *
 * @package AddressSearch\Service
 */
interface ResultInterface
{
    /**
     * @return Response\ResponseExceptionInterface|Response\ResponseSuccessInterface
     */
    public function getResponse();
}
