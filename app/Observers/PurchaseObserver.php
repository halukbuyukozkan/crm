<?php

namespace App\Observers;

use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseObserver
{
    public function creating(Purchase $purchase)
    {
        $purchase->user_id = Auth::user()->id;
    }
}
