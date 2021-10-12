<?php

namespace Agenta\TelegramBotSender;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Agenta\TelegramBotSender\Skeleton\SkeletonClass
 */
class TelegramBotSenderFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'telegrambotsender';
    }
}
