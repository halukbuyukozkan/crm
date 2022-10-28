<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DepartmentFolder;
use App\Models\DepartmentFolderFile;
use Illuminate\Support\Facades\File;
use App\Http\Requests\DepartmentFolderFileRequest;

class DepartmentFolderFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function index(Department $department, DepartmentFolder $departmentFolder)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function create(DepartmentFolder $departmentFolder)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentFolderFileRequest $request, Department $department ,DepartmentFolder $folder)
    {
        if($request->hasfile('filename')) {
            foreach($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $slugname = str_replace(' ', '', $folder->name);
                $name = '('.$slugname.')' . $filename . Str::random(4) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path().'/files/department/' , $name);   
    
                $file= new DepartmentFolderFile();
                $file->department_id = $department->id;
                $file->department_folder_id = $folder->id;
                $file->filename= $name;
                    
                $file->save();
            }}

        return redirect()->route('admin.department.folder.show',compact('department','folder'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @param  \App\Models\DepartmentFolderFile  $departmentFolderFile
     * @return \Illuminate\Http\Response
     */
    public function show(DepartmentFolder $departmentFolder, DepartmentFolderFile $departmentFolderFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @param  \App\Models\DepartmentFolderFile  $departmentFolderFile
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartmentFolder $departmentFolder, DepartmentFolderFile $departmentFolderFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @param  \App\Models\DepartmentFolderFile  $departmentFolderFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartmentFolder $departmentFolder, DepartmentFolderFile $departmentFolderFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @param  \App\Models\DepartmentFolderFile  $departmentFolderFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department,DepartmentFolder $folder, DepartmentFolderFile $file)
    {
        if(File::exists(public_path('files/department/'. $file->filename))){
            File::delete(public_path('files/department/'. $file->filename));
        }

        $file->delete();

        return redirect()->route('admin.department.folder.show',compact('department','folder'));
    }
}
