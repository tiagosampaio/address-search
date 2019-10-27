<?php

declare(strict_types = 1);

namespace AddressSearch\Framework\Http\Response;

/**
 * Interface ResponseSuccessInterface
 *
 * @package AddressSearch\Framework\Http\Response
 */
interface ResponseSuccessInterface extends ResponseInterface
{
    /**
     * @return array
     */
    public function getBody();
}
