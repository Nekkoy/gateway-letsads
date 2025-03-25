<?php

return [
    "enabled" => env('LETSADS_ENABLED', false),
    "login" => env('LETSADS_LOGIN', ''),
    "password" => env('LETSADS_PASSWORD', ''),
    "channel" => env('LETSADS_CHANNEL', 'sms'),
    "name_sms" => env('LETSADS_SMS_NAME', ''),
    "name_viber" => env('LETSADS_VIBER_NAME', ''),
    "priority" => env('LETSADS_PRIORITY', 1),
    "prefix" => env('LETSADS_PREFIX', "any"),
    "tags" => env('LETSADS_TAGS', '#smsads, #letsads'),
    "default" => env('LETSADS_DEFAULT', false),
    "devmode" => env('LETSADS_DEVMODE', false),
];
