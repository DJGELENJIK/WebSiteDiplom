<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use PhpParser\Node\Scalar\MagicConst\File;


class guaranteesConversation extends Conversation
{

    public function askReason()
    {
        $question = Question::create("Чтобы воспользоваться корзиной, нажмите в на кнопку 'Корзина' в шапке нашего сайта. Если я не смог ответить на ваш вопрос, вы можете посмотреть короткий ролик, как можно пользоваться корзиной.")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Спасибо, мне понятно')->value('1'),
                Button::create('Переключите меня на оператора')->value('2'),
            ])
            ->withAttachment( $attachment = new File('/pdf/nashi_garantii.pdf', [
                'custom_payload' => true,
            ]));

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === '1') {
                    $this->bot->startConversation(new anyQuestions);
                }
                if ($answer->getValue() === '2') {
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
