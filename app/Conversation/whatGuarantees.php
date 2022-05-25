<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;


class whatGuarantees extends Conversation
{

    public function askReason()
    {
        $attachment = new Video('/videos/videoplayback.mp4', [
            'custom_payload' => true,
        ]);

        $message = OutgoingMessage::create('This is my text')
            ->withAttachment($attachment);

        $this->reply($message);

    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
