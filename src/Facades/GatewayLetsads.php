<?php

namespace Nekkoy\GatewayLetsads\Facades;

use Illuminate\Support\Facades\Facade;
use Nekkoy\GatewayAbstract\DTO\MessageDTO;
use Nekkoy\GatewayAbstract\DTO\ResponseDTO;

/**
 * @method static ResponseDTO send(MessageDTO $message)
 */
class GatewayLetsads extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'gateway-letsads';
    }
}
