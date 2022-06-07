<?php

namespace App\Http\Controllers;

use App\Helpers\Telegram;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function index(Request $request, Telegram $telegram) {
        Log::debug($request->all());
        $public = explode('|', $request->input('callback_query')['data'])[0];
        $secret_key = explode('|', $request->input('callback_query')['data'])[1];
        $order = Order::where('phone', $secret_key)->first();
        if($public === 1){
            $buttons = [
                'inline_keyboard' => [
                    [
                        [
                            'text' => 'Принять ✅',
                            'callback_data' => '1|'.$request->phone,
                        ],
                        [
                            'text' => 'Отклонить',
                            'callback_data' => '0|'.$request->phone,
                        ]
                    ]
                ]
            ];
        } else {
            $buttons = [
                'inline_keyboard' => [
                    [
                        [
                            'text' => 'Принять',
                            'callback_data' => '1|'.$request->phone,
                        ],
                        [
                            'text' => 'Отклонить ✅',
                            'callback_data' => '0|'.$request->phone,
                        ]
                    ]
                ]
            ];
        }

        $data = [
            'id' =>$event->request->phone,
            'name' => $event->request->name,
            'email' => $event->request->email,
            'phone' => $event->request->phone,
        ];

        $order->status = explode('|', $request->input('callback_query')['data'])[0];
        $order->save();
        $telegram->editButtons(env('REPORT_TELEGRAM_ID'), (string)view('telegramViews.OrderReport', $data), $buttons, $request->input('callback_query')['message']['message_id']);
    }
}
