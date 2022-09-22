<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;
use App\Models\Status;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::whereHas('users', function (Builder $query) {
            $query->whereHas('department', function (Builder $query) {
                $query->where('name', Auth::user()->department->name);
            });
        })->get(); 


        return view('job.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $job = new Job($request->old());
        $statuses = Status::all();

        $users = Auth::user()->department->users;
        $superiors = User::permission('Satış Görev Atama')->get();
        $users = $users->merge($superiors);
    
            

        /*
        if(Auth::user()->hasAnyPermission('Genel Görev Atama'))
        {
            $users = User::role('Satış Çalışanı')->get();
            $superiors = User::permission('Satış Görev Atama')->get();
            $users = $users->merge($superiors);
        }
        elseif(Auth::user()->hasAnyPermission('Muhasebe Görev Atama'))
        {
            $users = User::role('Muhasebe Çalışanı')->get();
        }
        else {
            $users = null;
        }
        */

        $departments = Department::all();

        return view('job.form',compact('job','statuses','users','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $data = $request->validated();
        $data['deadline'] = Carbon::createFromFormat('Y-m-d', $data['deadline'])->format('d.m.Y');
        $job = Job::create($data);
        
        $job->users()->sync($data['users'] ?? []);

        return redirect()->route('admin.job.index')->with('success', 'Görev başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.job.index');
    }
}
