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


            if ($message == 'как оформить заказ?') {
                $bot->startConversation(new placeAnOrder);
            }

            if ($message == 'когда мне позвонят?') {
                $bot->startConversation(new callTime);
            }

            if ($message == 'как с вами связаться?') {
                $bot->startConversation(new communicationСhannels);
            }

            if ($message == 'какой товар взять?') {
                $bot->startConversation(new whatKindOfProduct);
            }

            if ($message == 'как оплатить?') {
                $bot->startConversation(new paymentMethods);
            }

            if ($message == 'сколько времени занимает доставка?') {
                $bot->startConversation(new deliveryTime);
            }

            if ($message == 'какие гарантии?') {
                $bot->startConversation(new whatGuarantees);
            }

            if ($message == 'чем ваш сервис лучше других?') {
                $bot->startConversation(new serviceBetter);
            }

            if ($message == 'где увидеть свою корзину?') {
                $bot->startConversation(new whereCart);
            }

            if ($message == 'как написать на почту?') {
                $bot->startConversation(new whatMail);
            }

            if ($message == 'у вас есть офис?') {
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
