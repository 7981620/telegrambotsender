<?php


return [

    'telegram_send' => env('TELEGRAM_SEND_ENABLE', false),
    'telegram_secret' => env('TELEGRAM_LOGGER_TOKEN', null),
    'telegram_chat_id' => env('TELEGRAM_LOGGER_CHAT_ID', null),

];
