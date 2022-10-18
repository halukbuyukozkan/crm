<?php

namespace App\Http\Controllers;

use App\Enum\TypeEnum;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Enum\ProjectTypeEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProjectRequest;
use Illuminate\Database\Eloquent\Builder;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::OfProject()->get();

        $superior_projects = Project::whereHas('user', function (Builder $query) {
            $query->permission('Ödeme Talebi Kabul Etme');
        })->get(); 

        if(Auth::user()->hasAnyPermission('Yetkili Ödeme Talep Kabul Etme')){
            $projects = $superior_projects;
        }
        return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $project = new Project($request->old());
        $projecttypes = ProjectTypeEnum::cases();

        return view('project.form',compact('project','projecttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request,Project $project)
    {
        $data = $request->validated();

        $project->fill($data);
        $project->save();

        return redirect()->route('admin.project.index')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $transections = $project->transections;

        return view('transection.index',compact('transections','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        foreach($project->transections as $transection)
        { 
            foreach($transection->transection_items as $item)
            {   
                if(File::exists(public_path('files/'. $item->filename))){
                    File::delete(public_path('files/'. $item->filename));
                }
            }
        }

        $project->delete();

        return redirect()->route('admin.project.index')->with('succes','Proje Başarıyla Silindi');
    }
}
