<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Departmentfolder;
use Illuminate\Http\Request;

class DepartmentfolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function index(Department $department)
    {
        $folders = Departmentfolder::ofUser()->get();

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
        $folder = new Departmentfolder($request->old());
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
            'departments' => 'array|required',
            'name' => 'required|string|max:255',
        ]);

        $folder = Departmentfolder::create($data);

        $folder->departments()->sync($data['departments'] ?? []);

        return redirect()->route('admin.department.folder.index',$department)->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department, Departmentfolder $folder)
    {   
        return view('department.folder.file.index',compact('department','folder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department, Departmentfolder $departmentFolder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department, Departmentfolder $departmentFolder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @param  \App\Models\Departmentfolder  $departmentFolder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department, Departmentfolder $folder)
    {
        $folder->delete();

        return redirect()->route('admin.department.folder.index',$department)->with('success',__('Dosya başarıyla silindi.'));
    }
}
