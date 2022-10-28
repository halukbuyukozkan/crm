<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentFolder;
use Illuminate\Http\Request;

class DepartmentFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function index(Department $department)
    {
        $folders = DepartmentFolder::ofUser()->get();

        return view('department.folder.index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,Department $department)
    {
        $folder = new DepartmentFolder($request->old());
        $departments = Department::all();

        return view('department.folder.form',compact('folder','department','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Department $department)
    {
        $data = $request->validate([
            'department_id' => 'required',
            'name' => 'required|string|max:255',
        ]);
        $folder = DepartmentFolder::create($data);

        return redirect()->route('admin.department.folder.index',$department)->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department, DepartmentFolder $folder)
    {   
        return view('department.folder.file.index',compact('department','folder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department, DepartmentFolder $departmentFolder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department, DepartmentFolder $departmentFolder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @param  \App\Models\DepartmentFolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department, DepartmentFolder $folder)
    {
        $folder->delete();

        return redirect()->route('admin.department.folder.index',$department)->with('success',__('Dosya başarıyla silindi.'));
    }
}
