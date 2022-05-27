<?php
namespace App\Http\Controllers;

use App\Conversation\placeAnOrder;
use App\Conversation\callTime;
use App\Conversation\communicationСhannels;
use App\Conversation\submitError;
use App\Conversation\whatKindOfProduct;
use App\Conversation\paymentMethods;
use App\Conversation\deliveryTime;
use App\Conversation\whatGuarantees;
use App\Conversation\serviceBetter;
use App\Conversation\whereCart;
use App\Conversation\whatMail;
use App\Conversation\whereOffice;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

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
            $error = array('ошибка','уменяошибка','ошибки','естьошибка','увасошибка','помогите','помощь','исправьтеошибку','исправитьошибку','какисправитьошибку','чтоделатьсошибкой','чтосделатьсошибкой','возможноувасошибка','вероятноувасошибка','помогитесошибкой','помощьсошибкой');
//           $bot->reply($message);

            if ($this->trigger($placeOrder, $message)) {
                $bot->startConversation(new placeAnOrder);
            }

            elseif ($this->trigger($whenCall, $message)) {
                $bot->startConversation(new callTime);
            }

            elseif ($this->trigger($howCall, $message)) {
                $bot->startConversation(new communicationСhannels);
            }

            elseif ($this->trigger($howPay, $message)) {
                $bot->startConversation(new paymentMethods);
            }

            elseif ($this->trigger($delivery, $message)) {
                $bot->startConversation(new deliveryTime);
            }

            elseif ($this->trigger($garanties, $message)) {
                $bot->startConversation(new whatGuarantees);
            }

            elseif ($this->trigger($service, $message)) {
                $bot->startConversation(new serviceBetter);
            }

            elseif ($this->trigger($basket, $message)) {
                $bot->startConversation(new whereCart);
            }

            elseif ($this->trigger($mail, $message)) {
                $bot->startConversation(new whatMail);
            }

            elseif ($this->trigger($HaveOffice, $message)) {
                $bot->startConversation(new whereOffice);
            }

            elseif ($this->trigger($error, $message)) {
                $bot->startConversation(new submitError);
            }

            else {
                $bot->reply('Я вас не понимаю');
            }

        });

        $botman->listen();
    }

    public function trigger ($arr, $message) {
        $flag = false;
        $message = preg_replace('/\s/', '', $message);
        $message = mb_strtolower($message, "UTF-8");
        foreach ($arr as $value) {
            if(str_contains($message, $value))
                $flag = true;
        }
        return $flag;
    }
}
