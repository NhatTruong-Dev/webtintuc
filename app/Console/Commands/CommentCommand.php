<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use function Sodium\increment;


class CommentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =  'command:auto-create-new-comment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create comment';

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
        DB::table('notifications')->insert([
            'data'=>'Đây là thông báo test task schedule!',
        ]);
    }
}
