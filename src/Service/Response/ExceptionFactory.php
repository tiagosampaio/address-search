<?php

declare(strict_types = 1);

namespace Telegram\Service\Response;

use AddressSearch\Framework\Http\Response\ResponseExceptionInterface;
use AddressSearch\Framework\Object\FactoryAbstract;

/**
 * Class ExceptionFactory
 * @package Telegram\Service\Response
 */
class ExceptionFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = ResponseExceptionInterface::class;
}
