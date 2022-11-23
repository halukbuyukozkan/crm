<?php

namespace App\Observers;

use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class TripObserver
{
    public function creating(Trip $trip)
    {
        $trip->user_id = Auth::user()->id;
    }
}
