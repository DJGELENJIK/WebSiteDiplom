<?php

namespace App\Conversation;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;


class submitError extends Conversation
{

    public function askPhoto($ismore = false)
    {
        if($ismore)
            $text = "Send next photo please ...";
        else
            $text = "Send first photo please .
                if you have no image click on bellow link

                /noimage
                ";
        $this->askForImages($text , function ($images) {
            $userID = $this->bot->getUser()->getId();
            $rand = rand(0,2555);

            foreach ($images as $image) {

                $url = $image->getUrl(); // The direct url
                $title = $image->getTitle(); // The title, if available
                $payload = $image->getPayload(); // The original payload
                // file_put_contents("userCache/$userID/img_$rand.jpg", file_get_contents($url));

                $txt = file_get_contents("userCache/$userID/imgs.txt");
                $myfile = fopen("userCache/$userID/imgs.txt", "w") or die("Unable to open file!");
                $txt .= "img[]=$url".'&';
                fwrite($myfile, $txt);
                fclose($myfile);

                $this->isMorePhoto();

            }


        }, function(Answer $answer) {
            $selectedText = $answer->getText();
            $selectedValue = $answer->getValue();
            $this->deleteLastMessage($answer);
            if( $selectedText == "/noimage")
                $this->askNumber();
            else
                $this->isMorePhoto();

        });
    }

    public function isMorePhoto()
    {

        $question = Question::create("do you have more photo to upload?")
            ->callbackId('isMorePhoto');
        $question->addButtons([
            Button::create("yes")->value("1"),
            Button::create("no")->value("0"),

        ]);

        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            $selectedText = $answer->getText();
            $selectedValue = $answer->getValue();
            $this->deleteLastMessage($answer);
            $this->bot->typesAndWaits(0.5);

            if($selectedValue)
                $this->askPhoto(true);
            else
                $this->askNumber();


        }  );

    }
    public function run()
    {
        $this->askPhoto();
    }
}
