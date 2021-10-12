<?php

namespace Agenta\TelegramBotSender;

use Illuminate\Support\Facades\Log;

class TelegramBotSender
{

    /**
     * Отправляет сообщение в телеграм бот
     *
     * @param string $message
     * @param array $recipients получатели
     * @return bool|void
     */
    public function send(string $message, array $recipients = [])
    {
        $send = config('telegrambotsender.telegram_send');
        $token = config('telegrambotsender.telegram_secret');
        $chat_id = config('telegrambotsender.telegram_chat_id');

        if (!$send | !$token) {
            return;
        }

        $chatIds = explode(',', $chat_id);

        if (!empty($recipients)) {
            $ids = $recipients;
        } elseif (!empty($chatIds)) {
            $ids = $chatIds;
        } else {
            return;
        }

        try {
            foreach ($ids as $id) {
                file_get_contents('https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query(
                        [
                            'text' => $message,
                            'chat_id' => $id,
                            'parse_mode' => 'html'
                        ])
                );
            }
        } catch (\Exception $e) {
            Log::error('Telegram (bad token/chat_id?): ' . $e->getMessage());
            return false;
        }

        return true;
    }

}
