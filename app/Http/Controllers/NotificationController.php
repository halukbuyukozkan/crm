<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $allNotifications = auth()->user()->notifications->paginate(10);
        return view('notifications.index',compact('allNotifications'));
    }
}