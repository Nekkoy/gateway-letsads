<?php

namespace Nekkoy\GatewayLetsads\DTO;

use Nekkoy\GatewayAbstract\DTO\AbstractConfigDTO;

/**
 *
 */
class ConfigDTO extends AbstractConfigDTO
{
    /**
     * Логин
     * @var string
     */
    public string $login;

    /**
     * Пароль
     * @var string
     */
    public string $password;

    /**
     * Канал отправки сообщения: sms/viber
     * @var string
     */
    public string $channel;

    /**
     * Имя при отправке через СМС
     * @var string
     */
    public string $name_sms;

    /**
     * Имя при отправке через Viber
     * @var string
     */
    public string $name_viber;

    /**
     * @var string
     */
    public string $handler = \Nekkoy\GatewayLetsads\Services\SendMessageService::class;
}
