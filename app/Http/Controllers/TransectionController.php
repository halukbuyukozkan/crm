<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enum\TypeEnum;
use App\Models\Project;
use App\Enum\StatusEnum;
use App\Models\Transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransectionRequest;

class TransectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $transection = new Transection($request->old());
        $project = $transection->project;

        $types = TypeEnum::cases();

        return view('transection.form',compact('transection','project','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransectionRequest $request)
    {
        $data = $request->validated();

        $project = Project::create([
            'name' => $request->project_name,
            'description' => $request->description,
        ]);

        $transection = Transection::create([
            'project_id' => $project->id,
            'category_id' => null,
            'price' => $data['price'],
            'is_income' => $data['is_income'],
            'is_completed' => $data['is_completed'],
            'type' => $data['type'],
        ]);      


        return redirect()->route('admin.front.index')->with('success', 'Transection created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transection  $transection
     * @return \Illuminate\Http\Response
     */
    public function show(Transection $transection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transection  $transection
     * @return \Illuminate\Http\Response
     */
    public function edit(Transection $transection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transection  $transection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transection $transection)
    {
        //
    }

    public function accept(Transection $transection)
    {
        $transection->status = StatusEnum::cases()[1]->value;
        $transection->payer = Auth::user()->name;
        $transection->update();

        $user = $transection->project->user;
        $user->balance = $transection->project->user->balance + $transection->price;
        $user->save();

        return redirect()->route('admin.front.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transection  $transection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transection $transection)
    {
        //
    }
}
