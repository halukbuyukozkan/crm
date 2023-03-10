<?php

namespace App\Providers;

use App\Events\DayoffApprove;
use App\Events\JobAssigned;
use App\Events\TransectionApproved;
use App\Listeners\SendDayoffApprovedMail;
use App\Listeners\SendDayoffApprovedNotification;
use App\Listeners\SendJobAssignedNotification;
use App\Listeners\SendJobNotification;
use App\Listeners\SendTransectionApprovedNotification;
use App\Models\Job;
use App\Observers\JobObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        JobAssigned::class => [
            SendJobAssignedNotification::class,
        ],
        TransectionApproved::class => [
            SendTransectionApprovedNotification::class,
        ],
        DayoffApprove::class => [
            SendDayoffApprovedNotification::class,
            //SendDayoffApprovedMail::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Job::observe(JobObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
