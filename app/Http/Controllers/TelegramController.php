<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function sendMessage($text = 'test')
    {
        $text = date("Y-m-d H:i:s");
        $token = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML',
        ]);

        return $response->json();
    }
}
