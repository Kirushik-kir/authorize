<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:dropDatabase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drops the table with name "eminem"';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::statement('DROP DATABASE IF EXISTS eminem');
    }
}
