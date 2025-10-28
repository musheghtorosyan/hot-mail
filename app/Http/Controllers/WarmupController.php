<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarmupController extends Controller
{
    public function warmup(){
        $controller = new TelegramController();
        $controller->sendMessage();
    }
}
