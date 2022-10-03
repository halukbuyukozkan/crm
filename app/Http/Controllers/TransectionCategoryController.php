<?php

namespace App\Http\Controllers;

use App\Models\TransectionCategory;
use Illuminate\Http\Request;

class TransectionCategoryController extends Controller
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
        $category = new TransectionCategory($request->old());

        return view('transection.transection_category.form',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,TransectionCategory $category)
    {
        $data = $request->validate([
            'name' => 'string|required|',
        ]);

        $category = TransectionCategory::create($data);;

        return redirect()->route('admin.costtransection')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransectionCategory  $transectionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TransectionCategory $transectionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransectionCategory  $transectionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TransectionCategory $transectionCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransectionCategory  $transectionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransectionCategory $transectionCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransectionCategory  $transectionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransectionCategory $transectionCategory)
    {
        //
    }
}
