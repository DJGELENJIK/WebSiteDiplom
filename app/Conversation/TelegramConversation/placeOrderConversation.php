<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;


class placeOrderConversation extends Conversation
{

    public function askReason()
    {
        $question = Question::create("Чтобы оформить заказ, нужно перейти в корзину и нажать заказать! Если я не смог ответить на ваш вопрос, вы можете посмотреть короткий ролик, как можно оформить заказ.")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Спасибо, мне понятно')->value('1'),
                Button::create('Посмотреть ролик')->value('2'),
                Button::create('Переключите меня на оператора')->value('3'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === '1') {
                    $this->bot->startConversation(new anyQuestions);
                }
                if ($answer->getValue() === '2') {
                    $attachment = new Video('/videos/Order.mp4', [
                        'custom_payload' => true,
                    ]);
                    $message = OutgoingMessage::create('Вот видео по этой теме')
                        ->withAttachment($attachment);
                    $this->say($message);
                }
                if ($answer->getValue() === '3') {
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
