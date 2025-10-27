<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WorkerEveryMinute extends Command
{
    // The command signature (namespace:name)
    protected $signature = 'worker:every-minute';

    protected $description = 'Runs every minute to perform background tasks';

    public function handle(): void
    {
        // Your logic here
        \Log::info('WorkerEveryMinute executed at ------------- ' . now());
    }
}
