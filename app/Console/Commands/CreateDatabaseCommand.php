<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Input\InputArgument;

class CreateDatabaseCommand extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:database';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a test DB with name "eminem"';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $link = mysqli_connect('127.0.0.1', 'root', 'Entity');
        if (!$link) {
            dd('Could not connect to the DB :(');
        }
        $link->query('CREATE DATABASE IF NOT EXISTS eminem');
        system('php artisan migrate');
        system('php artisan DB:seed');
        echo "NOW IT'S READY FOR USING :)" . "\n";
        //DB::statement('CREATE DATABASE IF NOT EXISTS eminem');
    }
}
