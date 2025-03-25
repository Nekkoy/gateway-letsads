# gateway-letsads
SMS Gateway для сервиса [LetsADS](https://letsads.com)

Установка:
```
composer require nekkoy/gateway-letsads
```

Конфигурация `.env`
===============
```
# Включить/выключить модуль
LETSADS_ENABLED=true

# Логин
LETSADS_LOGIN=

# Пароль
LETSADS_PASSWORD=

# Канал для отправки (sms/viber)
LETSADS_CHANNEL=sms

# Имя отправителя в СМС
LETSADS_SMS_NAME=

# Имя отправителя в Viber
LETSADS_VIBER_NAME=
```

Использование
===============

Создайте DTO сообщения, передав первым параметром текст, а вторым — номер получателя:
```
$message = new \Nekkoy\GatewayAbstract\DTO\MessageDTO("test", "+380123456789");
```

Затем вызовите метод отправки сообщения через фасад:
```
/** @var \Nekkoy\GatewayAbstract\DTO\ResponseDTO $response */
$response = \Nekkoy\GatewayLetsads\Facades\GatewayLetsads::send($message);
```

Метод возвращает DTO-ответ с параметрами:
 - message - сообщение об успешной отправке или ошибке
 - code - код ответа:
   - code < 0 - ошибка модуля
   - code > 0 - ошибка HTTP
   - code = 0 - успех
 - id - ID сообщения
