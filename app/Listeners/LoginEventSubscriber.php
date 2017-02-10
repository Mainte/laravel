<?php

namespace App\Listeners;

use App\Storico;
use App\User;

class LoginEventSubscriber
{   
    public function onAttempting($event){
        Storico::log('Tentavivo di login email "'.$event->credentials['email'].'"');
    }

    public function onLogin($event){
        Storico::log('Login utente "'.$event->user->name.'"');
    }

    public function onLogout($event){
        Storico::log('Logout utente "'.$event->user->name.'"');
    }


    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events){   
        $events->listen(
            'Illuminate\Auth\Events\Attempting',
            'App\Listeners\LoginEventSubscriber@onAttempting'
        );

        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\LoginEventSubscriber@onLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\LoginEventSubscriber@onLogout'
        );
    }

}