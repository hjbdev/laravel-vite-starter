<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LinkViteAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vite:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a symbolic link between resources and the vite folder.';

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
     * @return int
     */
    public function handle()
    {
        $vitePath = base_path('vite/resources');

        symlink(resource_path(), $vitePath);

        $this->info('linked ' . $vitePath . ' to '. resource_path());
    }
}
