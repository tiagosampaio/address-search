<?php

declare(strict_types = 1);

namespace AddressSearch\Service\Response;

use AddressSearch\Framework\Http\Response\ResponseExceptionAbstract;

/**
 * Class Exception
 * @package Telegram\Service\Response
 */
class Exception extends ResponseExceptionAbstract
{
    /**
     * @var \Exception
     */
    private $exception;

    /**
     * Exception constructor.
     * @param \Exception $exception
     */
    public function __construct(
        \Exception $exception
    ) {
        $this->exception = $exception;
    }
}
