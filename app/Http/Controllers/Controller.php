<?php

namespace App\Http\Controllers;

use App\Contracts\SmsService;
use App\Services\SmsServiceFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendSms(Request $request, SmsService $smsService)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'nullable',
            'message' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $phone = $request->phone;
        $message = $request->message;

        $smsService->sendSms($phone, $message);

        return response()->json(['message' => 'SMS sent successfully']);
    }

//    public function sendSms(SmsService $service){
//            $phoneNumber    = "+989148890122";
//            $message        = "hello factory design pattern";
//
//        $service->sendSms($phoneNumber,$message);
//    }
}
