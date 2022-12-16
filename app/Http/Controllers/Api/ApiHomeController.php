<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Models\Dayoff;
use App\Models\Message;
use App\Models\Project;
use App\Enum\StatusEnum;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['messages'] = Message::paginate();
        $data['informations'] = Information::paginate();
        $data['user'] = Auth::user();      

        // JOBS
        $jobs = Job::OfJob()->with('users')->get();
        $data['jobs'] = $this->permission($jobs);
        
        // PROJECTS 
        $data['projects'] = $this->project();
        // DAYOFFS
        $data['dayoffs'] = Dayoff::OfUser();

        $this->completedtotalprice($data['projects']);
        $data['transectionStatuses'] = StatusEnum::cases();

        return $data;
    }

    public function permission($jobs)
    {
        if(Auth::user()->hasAnyPermission('Genel Görev Atama')) {
            $jobs = $jobs->merge(Job::where('created_by',Auth::user()->name)->get());
        }

        $jobs = $jobs->map(function($item){
            $item->deadline = date('d.m.Y', strtotime($item->deadline));
            return $item;
        });
        
        return $jobs;
    }

    public function completedtotalprice($projects)
    {
        $projects->map(function($item) {
            $project = new Project;
            $completedtotal = $project->completedtotalprice($item);
            $totalprice = $project->totalprice($item);
            $item->completedtotal = $completedtotal;
            $item->total = $totalprice;
            $item->update();
        });        
    }

    public function project()
    {
        $projects = Project::OfPermission()->get();
        if(Auth::user()->hasAnyPermission('Yetkili Ödeme Talep Kabul Etme')){
            $projects = Project::OfSuperior(); 
        }

        return $projects;
    }

    public function dateFormat()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
