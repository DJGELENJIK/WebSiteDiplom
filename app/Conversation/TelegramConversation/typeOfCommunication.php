<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;


class typeOfCommunication extends Conversation
{

    public function askReason()
    {
        $question = Question::create("Как вам удобнее с нами связаться?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Почта')->value('1'),
                Button::create('Звонок')->value('2'),
                Button::create('Мессенджер')->value('3'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === '1') {
                    $this->say('Пожалуйста, введите вашу почту');
                    $this->bot->startConversation(new callOperatorConversation);
                }
                if ($answer->getValue() === '2' || $answer->getValue() === '3') {
                    $this->say('Пожалуйста, введите номер вашего телефона');
                    $this->bot->startConversation(new callOperatorConversation);
                }
            }
        });
    }

    public function run()
    {
        $this->askReason();
    }
}
