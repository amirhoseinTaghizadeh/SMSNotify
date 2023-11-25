<?php

namespace App\Services\SmsProviders;

use App\Contracs\SmsNotifierInterface;
use Kavenegar\Laravel\Facade as Kavenegar;

class KavenegarSmsNotifier implements SmsNotifierInterface
{

    public function sendSms($phoneNumber, $message)
    {
        try {
            $sender = "10004346";
            $receptor = [$phoneNumber];
            $result = Kavenegar::Send($sender, $receptor, $message);

            foreach ($result as $r) {
                return "messageid = $r->messageid";
                return "message = $r->message";
                return "status = $r->status";
                return "statustext = $r->statustext";
                return "sender = $r->sender";
                return "receptor = $r->receptor";
                return "date = $r->date";
                return "cost = $r->cost";
            }
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            echo $e->errorMessage();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
