<?php

namespace App\Listeners;

use App\Storico;
use Spatie\Backup\Events\BackupWasSuccessful;

class BackupEventSubscriber
{   
    public function backupSuccessful($event){
        Storico::log('Backup completato con successo');
    }

    public function backupFailed($event){
        Storico::log('Backup fallito');
    }

    public function backupCleanupSuccessful($event){
        Storico::log('Pulizia backup completata con successo');
    }

    public function backupCleanupFailed($event){
        Storico::log('Pulizia backup fallita');
    }


    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events){   
        $events->listen(
            'Spatie\Backup\Events\BackupWasSuccessful',
            'App\Listeners\BackupEventSubscriber@backupSuccessful'
        );

        $events->listen(
            'Spatie\Backup\Events\BackupHasFailed',
            'App\Listeners\BackupEventSubscriber@backupFailed'
        );

        $events->listen(
            'Spatie\Backup\Events\CleanupWasSuccessful',
            'App\Listeners\BackupEventSubscriber@backupCleanupSuccessful'
        );

        $events->listen(
            'Spatie\Backup\Events\CleanupHasFailed',
            'App\Listeners\BackupEventSubscriber@backupCleanupFailed'
        );

    }

}