<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WorkerEveryMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:worker-every-minute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        logger('----------------------------------');
    }
}
