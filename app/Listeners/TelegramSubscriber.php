<?php

namespace App\Listeners;

use App\Events\OrderStore;
use App\Helpers\Telegram;

class TelegramSubscriber
{

    protected $telegram;

    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }


    public function orderStore($event)
    {
        $data = [
            'id' =>$event->request->phone,
            'name' => $event->request->name,
            'email' => $event->request->email,
            'phone' => $event->request->phone,
        ];

        $buttons = [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Принять',
                        'callback_data' => '1|'.$event->request->phone,
                    ],
                    [
                        'text' => 'Отклонить',
                        'callback_data' => '0|'.$event->request->phone,
                    ]
                ]
            ]
        ];

        $this->telegram->sendButtons(env('REPORT_TELEGRAM_ID'), (string)view('telegramViews.OrderReport', $data), $buttons);

    }


    public function subscribe($events)
    {
        $events->listen(
            OrderStore::class, [
                TelegramSubscriber::class, 'orderStore'
            ]
        );
    }

}
