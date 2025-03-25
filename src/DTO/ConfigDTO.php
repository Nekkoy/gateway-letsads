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
    public $login;

    /**
     * Пароль
     * @var string
     */
    public $password;

    /**
     * Канал отправки сообщения: sms/viber
     * @var string
     */
    public $channel;

    /**
     * Имя при отправке через СМС
     * @var string
     */
    public $name_sms;

    /**
     * Имя при отправке через Viber
     * @var string
     */
    public $name_viber;

    /**
     * @var string
     */
    public $handler = \Nekkoy\GatewayLetsads\Services\SendMessageService::class;
}
