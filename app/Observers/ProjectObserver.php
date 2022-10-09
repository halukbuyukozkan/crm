<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectObserver
{
    public function creating(Project $project)
    {
        $project->user_id = Auth::user()->id;
    }
}
