<?php

namespace App\Console\Commands;

use App\Models\Hei;
use Illuminate\Console\Command;

class DeleteHeis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-heis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all HEIs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Hei::all()->each->delete();
    }
}
