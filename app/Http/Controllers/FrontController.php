<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Dayoff;
use App\Models\Message;
use App\Models\Project;
use App\Enum\StatusEnum;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::paginate();
        $informations = Information::paginate();
        $user = Auth::user();      

        // JOBS
        $jobs = Job::OfJob()->get();
        $jobs = $this->permission($jobs);
        $myjobs = Auth::user()->jobs;
        $otherjobs = $jobs->diff($myjobs);
        // PROJECTS 
        $projects = $this->project();
        // DAYOFFS
        $dayoffs = Dayoff::OfUser();

        $this->completedtotalprice($projects);
        $transectionstatuses = StatusEnum::cases();
        
        return view('index',compact('messages','projects','myjobs','otherjobs','informations','user','dayoffs','transectionstatuses'));
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

    public function project()
    {
        $projects = Project::OfPermission()->get();
        if(Auth::user()->hasAnyPermission('Yetkili Ödeme Talep Kabul Etme')){
            $projects = Project::OfSuperior(); 
        }

        return $projects;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
