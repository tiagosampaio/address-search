<?php

declare(strict_types = 1);

namespace AddressSearch\Framework\Http\Response;

/**
 * Class ResponseInterface
 *
 * @package AddressSearch\Framework\Http\Response
 */
interface ResponseInterface
{
    /**
     * @return bool
     */
    public function success();

    /**
     * @return bool
     */
    public function exception();
}
