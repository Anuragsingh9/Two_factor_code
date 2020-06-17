<?php

namespace App\Listeners;
use App\LoginActivity;

use App\Events\SuperAdmin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccess
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
     * @param  SuperAdmin  $event
     * @return void
     */
    public function handle(SuperAdmin $event)
    {
        
        LoginActivity::create([
            'user_id'       =>  $event->user->id,
            'email'         =>$event->user->email,
            'ip_address'    =>  \Illuminate\Support\Facades\Request::ip()
        ]);
    }
}
