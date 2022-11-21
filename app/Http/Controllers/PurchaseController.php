<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::ofPermission()->get()->paginate(10);

        return view('purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $purchase = new Purchase($request->old());

        return view('purchase.form',compact('purchase'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequest $request)
    {
        $data = $request->validated();

        $purchase = Purchase::create($data);
        
        return redirect()->route('admin.purchase.index')->with('success',__('Purchase created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseRequest $request, Purchase $purchase)
    {
        $data = $request->validated();

        $purchase->update($data);

        return redirect()->route('admin.purchase.index')->with('success',__('Purchase updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('admin.purchase.index')->with('success',__('Purchase deleted successfully.'));
    }

    public function approve(Purchase $purchase)
    {
        if($purchase->is_approved != 1){
            $purchase->is_approved = 1;
        }else { 
            $purchase->is_approved = 0; 
        }
        $purchase->update();

        return redirect()->route('admin.purchase.index')->with('success',__('Purchase approved successfully.'));
    }

    public function complete(Purchase $purchase)
    {
        if($purchase->is_paid != 1){
            $purchase->is_paid = 1;
        }else { 
            $purchase->is_paid = 0; 
        }
        $purchase->update();

        return redirect()->route('admin.purchase.index')->with('success',__('Purchase approved successfully.'));
    }


}
