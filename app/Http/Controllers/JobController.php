<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;
use App\Models\Image;
use App\Models\Status;
use App\Models\JobItem;
use App\Enum\StatusEnum;
use App\Models\Department;
use App\Events\JobAssigned;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        $jobs = Job::OfJob()->get();

        if(Auth::user()->hasAnyPermission('Genel Görev Atama')) {
            $jobs = $jobs->merge(Job::where('created_by',Auth::user()->name)->get());
        }
        
        $jobs = $jobs->map(function($item){
            $item->deadline = date('d.m.Y', strtotime($item->deadline));
            return $item;
        });

        $myjobs = Auth::user()->jobs->paginate(5 , '' , '', 'myjobs');
        $otherjobs = $jobs->diff($myjobs)->paginate(5 , '' , '', 'otherjobs');

        $transectionstatuses = StatusEnum::cases();

        return view('job.index',compact('myjobs','otherjobs','transectionstatuses'));
    }

    public function completejob(Request $request,Job $job)
    {
        $job->status_id = $request->status_id;
        $job->save();

        return redirect()->route('admin.job.index');
    }   

    public function completerequest(Job $job)
    {
        $jobstatuses = Status::all();
        $job->status_id = $jobstatuses[1]->id;
        $job->save();

        return redirect()->route('admin.job.index');
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $job = new Job($request->old());
        $jobstatuses = Status::all();

        $users = Auth::user()->department->users;
        $superiors = User::permission('Genel Görev Atama')->get();
        $users = $users->merge($superiors);
        
        $leader = User::role('Başkan')->get();
        $users = $users->diff($leader);

        $departments = Department::all();

        return view('job.form',compact('job','jobstatuses','users','departments'));
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
        $job = Job::create($data);

        $job->users()->sync($data['users'] ?? []);

        event(new JobAssigned($job));

        if($request->hasfile('filename')) {
        foreach($request->file('filename') as $file)
        {
            $name=$file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $slugname = str_replace(' ', '', $job->name);
            $name = '('.$slugname.')' . $filename . md5($name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path().'/files/job/', $name);   

            $file= new JobItem();
            $file->job_id = $job->id;
            $file->filename= $name;
                
            $file->save();
        }}    

        return redirect()->route('admin.job.index')->with('success', __('Job created successfully.'));
    }

    public function addfile(Job $job,Request $request)
    {
        foreach($request->filename as $file)
        {   
            $name=$file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $slugname = str_replace(' ', '', $job->name);
            $name = '('.$slugname.')' . $filename . md5($name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path().'/files/job/', $name);   

            $file= new JobItem();
            $file->job_id = $job->id;
            $file->filename= $name;
                
            $file->save();
        }

        return redirect()->route('admin.job.index')->with('success', __('File added successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        $date = Carbon::parse($job->deadline );
        $now = Carbon::now();
        $daysleft = $date->diffInDays($now);
        $jobstatuses = Status::all();

        return view('job.show',compact('job','daysleft','jobstatuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job,Request $request)
    {
        $job->fill($request->old());
        $jobstatuses = Status::all();

        $users = Auth::user()->department->users;
        $superiors = User::permission('Genel Görev Atama')->get();
        $users = $users->merge($superiors);

        $leader = User::role('Başkan')->get();
        $users = $users->diff($leader);

        $departments = Department::all();

        return view('job.form', compact('job','jobstatuses','users','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
        $data = $request->validated();

        $job->fill($data);
        $data['deadline'] = Carbon::createFromFormat('Y-m-d', $data['deadline'])->format('d.m.Y');
        $job->save();
        $job->users()->sync($data['users'] ?? []);

        return redirect()->route('admin.job.index')->with('success', __('Job updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        foreach($job->job_items as $item)
        { 
            if(File::exists(public_path('files/job/'. $item->filename))){
                File::delete(public_path('files/job/'. $item->filename));
            }
        }

        $job->delete();
        
        return redirect()->route('admin.job.index')->with('success', __('Job deleted successfully.'));
    }
}
