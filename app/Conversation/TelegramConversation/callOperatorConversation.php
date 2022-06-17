<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;


class callOperatorConversation extends Conversation
{

    public function askReason($typeCommunication)
    {
        if($typeCommunication === 'email') {
            $question = Question::create("Пожалуйста, введите вашу почту");
            return $this->ask($question, function (Answer $answer) {
                if ($answer->isInteractiveMessageReply()) {
                    if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $answer->getValue())) {
                        $this->say('Скоро с вами свяжется оператор, ожидайте');
                        $this->getResponse();
                        $this->bot->startConversation(new anyQuestions);
                    } else {
                        $this->say('Email введен некорректно. Пожалуйста, повторите ввод email еще раз.');
                        $this->bot->startConversation(new callOperatorConversation);
                    }
                }
            });
        }
        else {
            if($typeCommunication === 'phone') {
                $question = Question::create("Пожалуйста, введите вашу почту");
                return $this->ask($question, function (Answer $answer) {
                    if ($answer->isInteractiveMessageReply()) {
                        if ($answer->getValue()) {
                            $this->say('Скоро с вами свяжется оператор, ожидайте');
                            $this->getResponse();
                            $this->bot->startConversation(new anyQuestions);
                        }
                    }
                });
            }
        }
    }


    public function run()
    {
        $this->askReason();
    }
}
