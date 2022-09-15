<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\MoneyRequest;
use Illuminate\Http\Request;
use App\Models\MoneyRequestItem;
use Illuminate\Support\Facades\Auth;

class MoneyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasPermissionTo('Ödeme Talebi Kabul etme'))
        {
            $moneyRequests = MoneyRequest::all();
        }else{
            $moneyRequests = $user->moneyrequests;
        }

        
        return view('moneyrequest.index',compact('moneyRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $moneyRequestItem = new MoneyRequestItem($request->old());
        $moneyRequest = new MoneyRequest($request->old());
        $types = Type::all();

        return view('moneyrequest.form',compact('moneyRequestItem','moneyRequest','types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moneyRequest = MoneyRequest::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ]);

        $types = $request->type_id;
        $prices = $request->price;

        foreach($types as $type)
        {
            $moneyRequestItem = MoneyRequestItem::create([
                'money_request_id' => $moneyRequest->id,
                'type_id' => isset($type) ? $type : '',
                'price' => isset($prices[$type]) ? $prices[$type] : 0,  
            ]);
        }

        return redirect()->route('admin.moneyrequest.index')->with('success', 'Ödeme talebi başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MoneyRequest  $moneyRequest
     * @return \Illuminate\Http\Response
     */
    public function show(MoneyRequest $moneyrequest)
    {
        $moneyRequestItems = $moneyrequest->moneyrequestitems;

        return view('moneyrequest.moneyrequestitem.index',compact('moneyRequestItems','moneyrequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MoneyRequest  $moneyRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(MoneyRequest $moneyRequest,MoneyRequestItem $moneyRequestItem,Request $request)
    {
        $moneyRequest->fill($request->old());
        $moneyRequestItem->fill($request->old());
        $types = Type::all();

        return view('moneyrequest.form', compact('moneyRequest','moneyRequestItem','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MoneyRequest  $moneyRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoneyRequest $moneyRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MoneyRequest  $moneyRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoneyRequest $moneyrequest)
    {
        $moneyrequest->moneyrequestitems()->delete();
        $moneyrequest->delete();

        return redirect()->route('admin.moneyrequest.index');
    }
}
