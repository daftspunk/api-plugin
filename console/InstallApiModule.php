<?php namespace RainLab\Api\Console;

use Artisan;
use Illuminate\Console\Command;

class InstallApiModule extends Command
{
    protected $name = 'api:install';

    protected $description = 'Installs the API module.';

    public function handle()
    {
        // Install the module
        $this->call('october:migrate');
        $this->call('vendor:publish', [
            '--tag' => 'october.api',
        ]);
        $this->call('passport:install');

        $this->output->success('API module installed successfully!');
    }
}