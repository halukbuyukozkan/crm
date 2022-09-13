<?php

namespace App\Http\Controllers;

use App\Models\MoneyRequest;
use App\Models\MoneyRequestItem;
use App\Models\Type;
use Illuminate\Http\Request;

class MoneyRequestItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MoneyRequest $request)
    {
        dd($request);
        return view('moneyrequest.moneyrequestitem.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $moneyRequestItem = new MoneyRequestItem($request->old());
        $types = Type::all();

        return view('moneyrequest.moneyrequestitem.form',compact('moneyRequestItem','types'));
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
     * @param  \App\Models\MoneyRequestItem  $moneyRequestItem
     * @return \Illuminate\Http\Response
     */
    public function show(MoneyRequestItem $moneyRequestItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MoneyRequestItem  $moneyRequestItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MoneyRequestItem $moneyRequestItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MoneyRequestItem  $moneyRequestItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoneyRequestItem $moneyRequestItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MoneyRequestItem  $moneyRequestItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoneyRequestItem $moneyRequestItem)
    {
        //
    }
}
