<?php

namespace App\Listeners;

use App\Events\DayoffApprove;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\DayoffNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendDayoffApprovedNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(DayoffApprove $event)
    {
        Notification::send($event->dayoff->user, new DayoffNotification($event->dayoff));
    }
}
