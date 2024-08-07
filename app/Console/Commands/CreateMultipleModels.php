<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateMultipleModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:multiple-models {models*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create multiple models at once';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $models = $this->argument('models');

        foreach ($models as $model) {
            $this->call('make:model', ['name' => $model]);
        }

        $this->info('Models created successfully!');
    }
}
