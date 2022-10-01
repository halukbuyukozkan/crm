<?php

namespace App\Observers;

use App\Models\Transection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TransectionObserver
{
    public function creating(Transection $transection)
    {
        $transection->payee = Auth::user()->name;
    }

    public function created(Transection $transection)
    {
        Log::channel('transection')->info('Transection created by', [
            'user' => $transection->payee,
            'Transection name' => $transection->project->name
        ]);
    }

    public function updated()
    {
        Log::channel('transection')->info('Transection updated by', [
            'user' => Auth::user()->name
        ]);
    }

    public function deleting()
    {
        Log::channel('transection')->info('Transection deleted by', [
            'user' => Auth::user()->name
        ]);
    }
}
