<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Message;
use App\Models\Project;
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
        $messages = Message::all();
        $informations = Information::all();
        $user = Auth::user();
        if($user->hasPermissionTo('Ödeme Talebi Kabul etme'))
        {
            $projects = Project::all();
        }else{
            $projects = null;
        }

        if(Auth::user()->hasAnyPermission('Genel Görev Atama')) {
            $jobs = Job::whereHas('users', function (Builder $query) {
                $query->whereHas('department', function (Builder $query) {
                    $query->where('name', Auth::user()->department->name);
                });
            })->get(); 
            $jobs = $jobs->merge(Job::where('created_by',Auth::user()->name)->get());
        }else {
            $jobs = Auth::user()->jobs;
        }         

        
        $jobs = $jobs->map(function($item){
            $item->deadline = date('d.m.Y', strtotime($item->deadline));
            return $item;
        });

        $myjobs = Auth::user()->jobs;
        $otherjobs = $jobs->diff($myjobs);


        return view('index',compact('messages','projects','myjobs','otherjobs','informations','user'));
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
