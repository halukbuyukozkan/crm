<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Departmentfolder;
use App\Models\DepartmentfolderFile;
use Illuminate\Support\Facades\File;
use App\Http\Requests\DepartmentfolderFileRequest;

class DepartmentfolderFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function index(Department $department, Departmentfolder $departmentFolder)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function create(Departmentfolder $departmentFolder)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentfolderFileRequest $request, Department $department ,Departmentfolder $folder)
    {
        if($request->hasfile('filename')) {
            foreach($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $slugname = str_replace(' ', '', $folder->name);
                $name = '('.$slugname.')' . $filename . Str::random(4) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path().'/files/department/' , $name);   
    
                $file= new DepartmentfolderFile();
                $file->department_id = $department->id;
                $file->departmentfolder_id = $folder->id;
                $file->filename= $name;
                    
                $file->save();
            }}

        return redirect()->route('admin.department.folder.show',compact('department','folder'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @param  \App\Models\DepartmentfolderFile  $departmentFolderFile
     * @return \Illuminate\Http\Response
     */
    public function show(Departmentfolder $departmentFolder, DepartmentfolderFile $departmentFolderFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @param  \App\Models\DepartmentfolderFile  $departmentFolderFile
     * @return \Illuminate\Http\Response
     */
    public function edit(Departmentfolder $departmentFolder, DepartmentfolderFile $departmentFolderFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @param  \App\Models\DepartmentfolderFile  $departmentFolderFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departmentfolder $departmentFolder, DepartmentfolderFile $departmentFolderFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @param  \App\Models\DepartmentfolderFile  $departmentFolderFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department,Departmentfolder $folder, DepartmentfolderFile $file)
    {
        if(File::exists(public_path('files/department/'. $file->filename))){
            File::delete(public_path('files/department/'. $file->filename));
        }

        $file->delete();

        return redirect()->route('admin.department.folder.show',compact('department','folder'));
    }
}
