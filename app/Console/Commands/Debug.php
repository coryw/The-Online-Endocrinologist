<?php

namespace OE\Console\Commands;

use Illuminate\Console\Command;

class debug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:on';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Toggle debug mode - APP_DEBUG true/false';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Debug mode turned on!');
    }
}
