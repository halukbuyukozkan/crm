<?php

namespace App\Observers;

use App\Models\Transection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TransectionObserver
{
    public function creating(Transection $transection)
    {
        $transection->payee = Auth::user()->id;
        
        Log::channel('transection')->info('Transection created by', [
            'user' => Auth::user()->name
        ]);
    }

    public function deleting(Transection $transection)
    {
        Log::channel('transection')->info('Transection deleted by', [
            'user' => Auth::user()->name
        ]);
    }
}
