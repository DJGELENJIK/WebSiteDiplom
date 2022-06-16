<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;


class whereCart extends Conversation
{

    public function askReason()
    {
        $question = Question::create("Корзина находится в шапке нашего сайта. Я ответил на Ваш вопрос?")
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
                    $attachment = new Video('/videos/Korzina.mp4', [
                        'custom_payload' => true,
                    ]);
                    $message = OutgoingMessage::create('Вы можете посмотреть как пользоваться коризной в этом видео')
                        ->withAttachment($attachment);
                    $this->say($message);

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
