<?php

declare(strict_types=1);

namespace App\Console\Commands\Deployment;

use Illuminate\Console\Command;

class HerokuPostDeploy extends Command
{
    /** @var string */
    protected $signature = 'postdeploy:heroku {--refresh : refresh database migrations.}';
    /** @var string */
    protected $description = 'Run post-deploy on heroku';

    public function handle(): void
    {
        if (app()->environment('production')) {
            $this->call('migrate', ['--force', true]);
            $this->call('db:seed'); // Demo Content
            return;
        }

        if ($this->option('refresh')) {
            $this->call('migrate:refresh');
        }

        $this->call('migrate');
    }
}
