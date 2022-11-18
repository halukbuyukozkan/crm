<?php

namespace App\Listeners;

use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDayoffApprovedMail
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
    public function handle($event)
    {
        Mail::to('halukbuyukozkan@gmail.com')->send(new MailNotify($event->dayoff));
    }
}
