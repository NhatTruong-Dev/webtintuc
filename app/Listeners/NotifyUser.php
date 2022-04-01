<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class NotifyUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
//        $users =User::get();
//        foreach ($users as $users){
//            \Mail::to($users->email)->send(new UserMail($event->post));
//        }

        DB::table('notifications')->insert([
            'data'=>'Test event ! Thêm bài viết !',
        ]);
    }
}
