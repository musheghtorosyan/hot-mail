<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarmupController extends Controller
{
    public function warmup()
    {
        // Config: days 1-30 => number of emails/messages to send
        $dayConfig = [
            1  => 10,
            2  => 15,
            3  => 20,
            4  => 25,
            5  => 30,
            6  => 40,
            7  => 50,
            8  => 60,
            9  => 70,
            10 => 80,
            11 => 90,
            12 => 100,
            13 => 110,
            14 => 120,
            15 => 130,
            16 => 140,
            17 => 150,
            18 => 160,
            19 => 170,
            20 => 180,
            21 => 190,
            22 => 200,
            23 => 210,
            24 => 220,
            25 => 230,
            26 => 240,
            27 => 250,
            28 => 260,
            29 => 270,
            30 => 280,
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
