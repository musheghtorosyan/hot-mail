<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarmupController extends Controller
{
    public function warmup(){

        $text = now()->toDateTimeString().'---';





        $controller = new TelegramController($text);
        $controller->sendMessage();
    }
}
