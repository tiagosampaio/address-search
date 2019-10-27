<?php

declare(strict_types = 1);

namespace Telegram\Framework\Http\Response;

/**
 * Class ResponseAbstract
 *
 * @package AddressSearch\Framework\Http\Response
 */
abstract class ResponseAbstract implements ResponseInterface
{
    /**
     * @return bool
     */
    public function canParse()
    {
        return (bool) $this->success();
    }
}
