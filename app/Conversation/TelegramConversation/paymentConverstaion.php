<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;


class paymentConverstaion extends Conversation
{

    public function askReason()
    {

        $question = Question::create("Оплата происходит при получении заказа курьеру наличными или банковской картой.")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Спасибо, мне понятно')->value('1'),
                Button::create('Переключите меня на оператора')->value('2'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === '1') {
                    $this->bot->startConversation(new anyQuestions);
                } else {
                    $this->bot->startConversation(new typeOfCommunication);
                }
            }
        });
    }

    public function run()
    {
        $this->askReason();
    }
}
