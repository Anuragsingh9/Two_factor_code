<?php

namespace App\Listeners;
use App\LoginActivity;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        dd("ok");
        LoginActivity::create([
            'user_id'       =>  $event->user->id,
            'email'         =>$event->user->email,
            'ip_address'    =>  \Illuminate\Support\Facades\Request::ip()
        ]);
    }
}


















