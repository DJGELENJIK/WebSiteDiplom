<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;


class anyQuestions extends Conversation
{

    public function askReason()
    {
        $question = Question::create("У вас ещё остались вопросы?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Да')->value('1'),
                Button::create('Нет')->value('2'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === '1') {
                    $this->bot->handle();
                } else {
                    $userFirstName = $this->bot->getUser();
                    $this->say('Если у вас ещё появятся вопросы, просто напишите мне. Хорошего вам дня,' . $userFirstName);
                    $telegram = app('telegram');
                    $telegram->listen();
                }
            }
        });
    }

    public function run()
    {
        $this->askReason();
    }
}
