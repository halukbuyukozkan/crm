<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\JobAssigned;
use App\Notifications\JobNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendJobAssignedNotification
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
     * @param  \App\Events\JobAssigned  $event
     * @return void
     */
    public function handle(JobAssigned $event)
    {
        foreach($event->job->users as $user)
        Notification::send($user, new JobNotification($event->job));
    }
}
