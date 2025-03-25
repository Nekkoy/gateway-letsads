<?php

namespace Nekkoy\GatewayLetsads\Services;

use Nekkoy\GatewayLetsads\DTO\ConfigDTO;

/**
 *
 */
class GatewayService
{
    protected array $config;

    public function __construct()
    {
        $this->config = config('gateway-letsads', []);
    }

    /**
     * @return ConfigDTO
     */
    public function getConfig()
    {
        return new ConfigDTO($this->config);
    }
}
