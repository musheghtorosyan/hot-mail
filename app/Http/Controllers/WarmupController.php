<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarmupController extends Controller
{
    public function warmup()
    {
        // Config: days 1-30 => number of emails/messages to send
        $dayConfig = [
            1 => 10,
            2 => 12,
            3 => 15,
            4 => 18,
            5 => 20,
            6 => 22,
            7 => 25,
            8 => 28,
            9 => 30,
            10 => 32,
            11 => 35,
            12 => 38,
            13 => 40,
            14 => 42,
            15 => 45,
            16 => 48,
            17 => 50,
            18 => 52,
            19 => 55,
            20 => 58,
            21 => 60,
            22 => 62,
            23 => 65,
            24 => 68,
            25 => 70,
            26 => 72,
            27 => 75,
            28 => 78,
            29 => 80,
            30 => 85,
        ];

        // Config: allowed sending time (24h format)
        $timeConfig = [
            'start' => '09:00',
            'end' => '20:00',
        ];

        // Get current time
        $currentTime = now()->format('H:i');

        // Check if current time is within allowed sending hours
        if ($currentTime >= $timeConfig['start'] && $currentTime <= $timeConfig['end']) {
            $day = now()->day; // get current day of the month (1-31)

            $count = $dayConfig[$day] ?? 0; // get count for today, default 0

            if ($count > 0) {
                // Example action: send Telegram message
                $text = now()->toDateTimeString() . " --- Sending $count emails/messages for day $day";
                $controller = new TelegramController();
                $controller->sendMessage($text);

                // Here you can loop and send $count emails if needed
                // for ($i = 0; $i < $count; $i++) { ... send email ... }
            } else {
                $controller = new TelegramController();
                $controller->sendMessage(now()->toDateTimeString() . " --- No emails/messages configured for today.");
            }
        } else {
            $controller = new TelegramController();
            $controller->sendMessage(now()->toDateTimeString() . " --- Not sending emails/messages, outside allowed time.");
        }
    }
}
