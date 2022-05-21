<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;


class placeAnOrder extends Conversation
{

    public function askReason()
    {
        $question = Question::create("Чтобы оформить заказ, нужно перейти в корзину и нажать заказать! Я ответил на ваш вопрос?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Да')->value('yes'),
                Button::create('Нет')->value('no'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'yes') {
                    $this->say('Хорошо! Если у вас будут ещё вопросы, обращайтесь!');
                } else {
                    $this->say('Если я не смог ответить на ваш вопрос, прошу позвоните на нашу горячую линию! +7(977)153-63-05');
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
