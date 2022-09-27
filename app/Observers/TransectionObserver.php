<?php

namespace App\Observers;

use App\Models\Transection;
use Illuminate\Support\Facades\Auth;

class TransectionObserver
{
    public function creating(Transection $transection)
    {
        $transection->payee = Auth::user()->id;
    }
}
