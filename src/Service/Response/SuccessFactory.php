<?php

declare(strict_types = 1);

namespace Telegram\Service\Response;

use AddressSearch\Framework\Http\Response\ResponseSuccessInterface;
use AddressSearch\Framework\Object\FactoryAbstract;

/**
 * Class SuccessFactory
 * @package AddressSearch\Service\Response
 */
class SuccessFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = ResponseSuccessInterface::class;
}
