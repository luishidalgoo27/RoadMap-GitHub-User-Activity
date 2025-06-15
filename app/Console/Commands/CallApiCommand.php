<?php

namespace App\Console\Commands;

use App\Services\CallApiService;
use Illuminate\Console\Command;

class CallApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github-activity {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for get a a github user activity.';


    public function __construct(private CallApiService $callapiService) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument("name");
        $this->callapiService->eventsUser($name);

        return 0;
    }
}
