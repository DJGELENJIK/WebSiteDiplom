<?php
namespace App\Http\Controllers;

use App\Conversation\FastAnswerQuestionConverstaion;

class TelegramConversationController extends Controller
{

    public function handle()
    {
        $telegram = app('telegram');

        $telegram->hears('{TelegramApiResponse}', function($bot) {


            if ($this->answer()) {
                $bot->startConversation(new FastAnswerQuestionConverstaion);
            }
        });

        $telegram->listen();
    }
}
