<?php
namespace App\Http\Controllers;

use App\Conversation\placeAnOrder;
use App\Conversation\callTime;
use App\Conversation\communicationСhannels;
use App\Conversation\whatKindOfProduct;
use App\Conversation\paymentMethods;
use App\Conversation\deliveryTime;
use App\Conversation\whatGuarantees;
use App\Conversation\serviceBetter;
use App\Conversation\whereCart;
use App\Conversation\whatMail;
use App\Conversation\whereOffice;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');


        $botman->hears('{message}', function($bot, $message) {

            $message = preg_replace('/\s/', '', $message);
            $message = mb_strtolower($message, "UTF-8");

            $bot->reply($message);
            if ($message == 'какоформитьзаказ?') {
                $bot->startConversation(new placeAnOrder);
            }

            if ($message == 'когдамнепозвонят?') {
                $bot->startConversation(new callTime);
            }

            if ($message == 'каксвамисвязаться?') {
                $bot->startConversation(new communicationСhannels);
            }

            if ($message == 'какойтоварвзять?') {
                $bot->startConversation(new whatKindOfProduct);
            }

            if ($message == 'какоплатить?') {
                $bot->startConversation(new paymentMethods);
            }

            if ($message == 'скольковременизанимаетдоставка?') {
                $bot->startConversation(new deliveryTime);
            }

            if ($message == 'какиегарантии?') {
                $bot->startConversation(new whatGuarantees);
            }

            if ($message == 'чемвашсервислучшедругих?') {
                $bot->startConversation(new serviceBetter);
            }

            if ($message == 'гдеувидетьсвоюкорзину?') {
                $bot->startConversation(new whereCart);
            }

            if ($message == 'какнаписатьнапочту?') {
                $bot->startConversation(new whatMail);
            }

            if ($message == 'увасестьофис?') {
                $bot->startConversation(new whereOffice);
            }


        });

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }
}
