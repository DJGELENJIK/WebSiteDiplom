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

    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($bot, $message) {
            $placeOrder = array('какоформитьзаказ','каксделатьзаказ','хочусделатьзаказ','сделатьзаказ','заказать','оформлениезаказа','заказ','создатьзаказ','купить','каккупить');
            $whenCall = array('когдапозвонят','когдамнепозвонят','ждузвонок','звонок','мнепозвонят','перезвонить','перезвоните','когдаждатьзвонок','когдазвонок','когдаоператормнепозвонит');
            $howCall = array('вашиконтакты','каксвамисвязаться','какдостучаться','какдостучатьсядовас','вашиданные');
            $howPay = array('какоплатить','оплата','какпроизвестиоплату','чемоплатить','когдаоплатить','когдаоплачивать','какясмогуоплатить','можнооплатить','когдапроизводитсяоплата');
            $HaveOffice = array('выимеетеофис', 'увасестьофис', 'хочувофис', 'нуженвашофис', 'какприехатьвофис', 'адресофиса', 'мненуженофис', 'номерофиса', 'приезжаювофис', 'офис',);
            $mail = array('какнаписатьнапочту', 'каксвамисвязатьсяпопочте', 'почта', 'хочупочту', 'нужнапочта', 'ответнапочту', 'почтаесть', 'общениепочтой', 'почтаимеется', 'вашапочта',);
            $basket = array('корзина', 'моякорзина', 'гдекорзина', 'нужнакорзина', 'хочувкорзину', 'увасестькорзина', 'вашакорзина', 'какпопастьвкорзину', 'корзинка', 'попадувкорзину',);
            $service = array('вашсервис', 'нашсерсвис', 'чемлучше', 'сервис', 'сервислучше', 'чемвылучше', 'чемвашсервислучшедругих', 'почемувашсервислучшедругих', 'почемувылучше', 'вылучше',);
            $garanties = array('вашигарантии', 'гарантии', 'гдегарантии', 'какиегарантии', 'хочугарантии', 'мненужныгарантии', 'какузнатьвашигарантии', 'ждугарантии', 'ожидаюгарантии', 'какиеувасгарантии',);
            $delivery = array('доставка', 'моядоставка', 'гдедоставка', 'когдадоставка', 'восколькодоставка', 'ожидаюдоставку', 'скольковременизайметдоставка', 'вашадоставка', 'мненужнадоставка', 'доставочка',);
            $message = preg_replace('/\s/', '', $message);
            $message = mb_strtolower($message, "UTF-8");



//            $bot->reply($message);
            if (in_array($message, $placeOrder, true)) {
                $bot->startConversation(new placeAnOrder);
            }

            if (in_array($message, $whenCall, true)) {
                $bot->startConversation(new callTime);
            }

            if (in_array($message, $howCall, true)) {
                $bot->startConversation(new communicationСhannels);
            }

            if (in_array($message, $howPay, true)) {
                $bot->startConversation(new paymentMethods);
            }

            if (in_array($message, $delivery, true)) {
                $bot->startConversation(new deliveryTime);
            }

            if (in_array($message, $garanties, true)) {
                $bot->startConversation(new whatGuarantees);
            }

            if (in_array($message, $service, true)) {
                $bot->startConversation(new serviceBetter);
            }

            if (in_array($message, $basket, true)) {
                $bot->startConversation(new whereCart);
            }

            if (in_array($message, $mail, true)) {
                $bot->startConversation(new whatMail);
            }

            if (in_array($message, $HaveOffice, true)) {
                $bot->startConversation(new whereOffice);
            }


        });

        $botman->listen();
    }
}
