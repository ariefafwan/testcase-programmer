<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Console\Migrations\FreshCommand;

class SeedFresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:fresh';

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
        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->info('Berhasil Fresh Migration & Seeding');
    }
}
