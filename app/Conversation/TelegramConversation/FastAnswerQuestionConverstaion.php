<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;


class FastAnswerQuestionConverstaion extends Conversation
{

    public function askReason()
    {
        $question = Question::create("Вот список часто задаваемых вопросов.")
            ->fallback('')
            ->callbackId('ask_question')
            ->addButtons([
                Button::create('Как оформить заказ?')->value('1'),
                Button::create('Как происходит оплата?')->value('2'),
                Button::create('Как пользоваться корзиной?')->value('3'),
                Button::create('Какие гарантии?')->value('4'),
                Button::create('Переключите меня на оператора')->value('5'),
                Button::create('Назад')->value('6'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === '1') {
                    $this->bot->startConversation(new placeOrderConversation);
                }
                if ($answer->getValue() === '2') {
                    $this->bot->startConversation(new paymentConversation);
                }
                if ($answer->getValue() === '3') {
                    $this->bot->startConversation(new basketConversation);
                }
                if ($answer->getValue() === '4') {
                    $this->bot->startConversation(new guaranteesConversation);
                }
                if ($answer->getValue() === '5') {
                    $this->bot->startConversation(new typeOfCommunication);
                }
                if ($answer->getValue() === '6') {
                    $this->bot->handle();
                }
            }
        });
    }

    public function run()
    {
        $this->askReason();
    }
}
