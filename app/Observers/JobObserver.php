<?php

namespace App\Observers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobObserver
{
    public function creating(Job $job)
    {
        $job->created_by = Auth::user()->name;
    }

    public function updating(Job $job)
    {
        $job->updated_by = Auth::user()->name;
    }
}
